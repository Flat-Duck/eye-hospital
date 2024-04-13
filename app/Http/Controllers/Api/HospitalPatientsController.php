<?php

namespace App\Http\Controllers\Api;

use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PatientResource;
use App\Http\Resources\PatientCollection;

class HospitalPatientsController extends Controller
{
    public function index(
        Request $request,
        Hospital $hospital
    ): PatientCollection {
        $this->authorize('view', $hospital);

        $search = $request->get('search', '');

        $patients = $hospital
            ->patients()
            ->search($search)
            ->latest()
            ->paginate();

        return new PatientCollection($patients);
    }

    public function store(Request $request, Hospital $hospital): PatientResource
    {
        $this->authorize('create', Patient::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'birth_date' => ['required', 'date'],
            'n_id' => ['required', 'max:255'],
            'gender' => ['required', 'in:male,female'],
            'phone' => ['required', 'max:255', 'string'],
            'escort_phone' => ['required', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'category' => ['required', 'max:255', 'string'],
        ]);

        $patient = $hospital->patients()->create($validated);

        return new PatientResource($patient);
    }
}
