<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DiagnoseResource;
use App\Http\Resources\DiagnoseCollection;

class PatientDiagnosesController extends Controller
{
    public function index(
        Request $request,
        Patient $patient
    ): DiagnoseCollection {
        $this->authorize('view', $patient);

        $search = $request->get('search', '');

        $diagnoses = $patient
            ->diagnoses()
            ->search($search)
            ->latest()
            ->paginate();

        return new DiagnoseCollection($diagnoses);
    }

    public function store(Request $request, Patient $patient): DiagnoseResource
    {
        $this->authorize('create', Diagnose::class);

        $validated = $request->validate([
            'eye' => ['required', 'in:left,right'],
            'BCVA' => ['nullable', 'max:255', 'string'],
            'IOP' => ['nullable', 'max:255', 'string'],
            'LID' => ['nullable', 'max:255', 'string'],
            'conjunctiva' => ['nullable', 'max:255', 'string'],
            'cornea' => ['nullable', 'max:255', 'string'],
            'AC' => ['nullable', 'max:255', 'string'],
            'IrisPupil' => ['nullable', 'max:255', 'string'],
            'lens' => ['nullable', 'max:255', 'string'],
            'fundus' => ['nullable', 'max:255', 'string'],
            'remarks' => ['nullable', 'max:255', 'string'],
            'diagnosis' => ['nullable', 'max:255', 'string'],
            'OCT' => ['file', 'max:1024', 'nullable'],
            'US' => ['file', 'max:1024', 'nullable'],
            'pantacam' => ['file', 'max:1024', 'nullable'],
        ]);

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

        $diagnose = $patient->diagnoses()->create($validated);

        return new DiagnoseResource($diagnose);
    }
}
