<?php

namespace App\Http\Controllers\Api;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\HospitalResource;
use App\Http\Resources\HospitalCollection;
use App\Http\Requests\HospitalStoreRequest;
use App\Http\Requests\HospitalUpdateRequest;

class HospitalController extends Controller
{
    public function index(Request $request): HospitalCollection
    {
        $this->authorize('view-any', Hospital::class);

        $search = $request->get('search', '');

        $hospitals = Hospital::search($search)
            ->latest()
            ->paginate();

        return new HospitalCollection($hospitals);
    }

    public function store(HospitalStoreRequest $request): HospitalResource
    {
        $this->authorize('create', Hospital::class);

        $validated = $request->validated();

        $hospital = Hospital::create($validated);

        return new HospitalResource($hospital);
    }

    public function show(Request $request, Hospital $hospital): HospitalResource
    {
        $this->authorize('view', $hospital);

        return new HospitalResource($hospital);
    }

    public function update(
        HospitalUpdateRequest $request,
        Hospital $hospital
    ): HospitalResource {
        $this->authorize('update', $hospital);

        $validated = $request->validated();

        $hospital->update($validated);

        return new HospitalResource($hospital);
    }

    public function destroy(Request $request, Hospital $hospital): Response
    {
        $this->authorize('delete', $hospital);

        $hospital->delete();

        return response()->noContent();
    }
}
