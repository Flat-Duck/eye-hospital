<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\PatientResource;
use App\Http\Resources\PatientCollection;
use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;

class PatientController extends Controller
{
    public function index(Request $request): PatientCollection
    {
        $this->authorize('view-any', Patient::class);

        $search = $request->get('search', '');

        $patients = Patient::search($search)
            ->latest()
            ->paginate();

        return new PatientCollection($patients);
    }

    public function store(PatientStoreRequest $request): PatientResource
    {
        $this->authorize('create', Patient::class);

        $validated = $request->validated();

        $patient = Patient::create($validated);

        return new PatientResource($patient);
    }

    public function show(Request $request, Patient $patient): PatientResource
    {
        $this->authorize('view', $patient);

        return new PatientResource($patient);
    }

    public function update(
        PatientUpdateRequest $request,
        Patient $patient
    ): PatientResource {
        $this->authorize('update', $patient);

        $validated = $request->validated();

        $patient->update($validated);

        return new PatientResource($patient);
    }

    public function destroy(Request $request, Patient $patient): Response
    {
        $this->authorize('delete', $patient);

        $patient->delete();

        return response()->noContent();
    }
}
