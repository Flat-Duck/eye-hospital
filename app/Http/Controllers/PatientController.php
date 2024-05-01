<?php

namespace App\Http\Controllers;

use App\Jobs\AppointmentReminder;
use App\Models\City;
use App\Models\Patient;
use App\Models\Hospital;
use App\Models\Template;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Patient::class);

        $search = $request->get('search', '');

        $patients = Patient::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.patients.index', compact('patients', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Patient::class);

        $hospitals = Hospital::pluck('name', 'id');
        $cities = City::pluck('name', 'id');

        return view('app.patients.create', compact('hospitals', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Patient::class);

        $validated = $request->validated();

        $patient = Patient::create($validated);

        return redirect()
            ->route('patients.edit', $patient)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Patient $patient): View
    {
        $this->authorize('view', $patient);

        return view('app.patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Patient $patient): View
    {
        $this->authorize('update', $patient);

        $hospitals = Hospital::pluck('name', 'id');
        $cities = City::pluck('name', 'id');

        return view('app.patients.edit', compact('patient', 'hospitals', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( PatientUpdateRequest $request, Patient $patient ): RedirectResponse {
        $this->authorize('update', $patient);

        $validated = $request->validated();

        $patient->update($validated);

        $this->operation($patient);
        return redirect()
            ->route('patients.edit', $patient)
            ->withSuccess(__('crud.common.saved'));
    }

        /**
     * Update the specified resource in storage.
     */
    public function operation(Patient $patient){
       // $this->authorize('update', $patient);
        
       
        $templates = Template::all();

        foreach ($templates as $k => $template) {
            dispatch(new AppointmentReminder($patient, $template))->delay(now());//->addDays($template->after));
        }
        return redirect()
            ->route('patients.edit', $patient)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Patient $patient
    ): RedirectResponse {
        $this->authorize('delete', $patient);

        $patient->delete();

        return redirect()
            ->route('patients.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
