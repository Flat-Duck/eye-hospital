<?php

namespace App\Http\Controllers\Api;

use App\Models\Diagnose;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\DiagnoseResource;
use App\Http\Resources\DiagnoseCollection;
use App\Http\Requests\DiagnoseStoreRequest;
use App\Http\Requests\DiagnoseUpdateRequest;

class DiagnoseController extends Controller
{
    public function index(Request $request): DiagnoseCollection
    {
        $this->authorize('view-any', Diagnose::class);

        $search = $request->get('search', '');

        $diagnoses = Diagnose::search($search)
            ->latest()
            ->paginate();

        return new DiagnoseCollection($diagnoses);
    }

    public function store(DiagnoseStoreRequest $request): DiagnoseResource
    {
        $this->authorize('create', Diagnose::class);

        $validated = $request->validated();
        if ($request->hasFile('OCT')) {
            $validated['OCT'] = $request->file('OCT')->store('public');
        }

        if ($request->hasFile('US')) {
            $validated['US'] = $request->file('US')->store('public');
        }

        if ($request->hasFile('pantacam')) {
            $validated['pantacam'] = $request
                ->file('pantacam')
                ->store('public');
        }

        $diagnose = Diagnose::create($validated);

        return new DiagnoseResource($diagnose);
    }

    public function show(Request $request, Diagnose $diagnose): DiagnoseResource
    {
        $this->authorize('view', $diagnose);

        return new DiagnoseResource($diagnose);
    }

    public function update(
        DiagnoseUpdateRequest $request,
        Diagnose $diagnose
    ): DiagnoseResource {
        $this->authorize('update', $diagnose);

        $validated = $request->validated();

        if ($request->hasFile('OCT')) {
            if ($diagnose->OCT) {
                Storage::delete($diagnose->OCT);
            }

            $validated['OCT'] = $request->file('OCT')->store('public');
        }

        if ($request->hasFile('US')) {
            if ($diagnose->US) {
                Storage::delete($diagnose->US);
            }

            $validated['US'] = $request->file('US')->store('public');
        }

        if ($request->hasFile('pantacam')) {
            if ($diagnose->pantacam) {
                Storage::delete($diagnose->pantacam);
            }

            $validated['pantacam'] = $request
                ->file('pantacam')
                ->store('public');
        }

        $diagnose->update($validated);

        return new DiagnoseResource($diagnose);
    }

    public function destroy(Request $request, Diagnose $diagnose): Response
    {
        $this->authorize('delete', $diagnose);

        if ($diagnose->OCT) {
            Storage::delete($diagnose->OCT);
        }

        if ($diagnose->US) {
            Storage::delete($diagnose->US);
        }

        if ($diagnose->pantacam) {
            Storage::delete($diagnose->pantacam);
        }

        $diagnose->delete();

        return response()->noContent();
    }
}
