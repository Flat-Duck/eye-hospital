<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Diagnose;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DiagnoseStoreRequest;
use App\Http\Requests\DiagnoseUpdateRequest;

class DiagnoseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Diagnose::class);

        $search = $request->get('search', '');

        $diagnoses = Diagnose::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.diagnoses.index', compact('diagnoses', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Diagnose::class);

        $patients = Patient::pluck('name', 'id');

        return view('app.diagnoses.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiagnoseStoreRequest $request): RedirectResponse
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

        return redirect()
            ->route('diagnoses.edit', $diagnose)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Diagnose $diagnose): View
    {
        $this->authorize('view', $diagnose);

        return view('app.diagnoses.show', compact('diagnose'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Diagnose $diagnose): View
    {
        $this->authorize('update', $diagnose);

        $patients = Patient::pluck('name', 'id');

        return view('app.diagnoses.edit', compact('diagnose', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        DiagnoseUpdateRequest $request,
        Diagnose $diagnose
    ): RedirectResponse {
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

        return redirect()
            ->route('diagnoses.edit', $diagnose)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Diagnose $diagnose
    ): RedirectResponse {
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

        return redirect()
            ->route('diagnoses.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
