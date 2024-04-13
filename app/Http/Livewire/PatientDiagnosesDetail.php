<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use App\Models\Diagnose;
use Illuminate\View\View;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PatientDiagnosesDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public Patient $patient;
    public Diagnose $diagnose;
    public $diagnoseOct;
    public $diagnoseUs;
    public $diagnosePantacam;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Diagnose';

    protected $rules = [
        'diagnose.eye' => ['required', 'in:left,right'],
        'diagnose.BCVA' => ['nullable', 'max:255', 'string'],
        'diagnose.IOP' => ['nullable', 'max:255', 'string'],
        'diagnose.LID' => ['nullable', 'max:255', 'string'],
        'diagnose.conjunctiva' => ['nullable', 'max:255', 'string'],
        'diagnose.cornea' => ['nullable', 'max:255', 'string'],
        'diagnose.AC' => ['nullable', 'max:255', 'string'],
        'diagnose.IrisPupil' => ['nullable', 'max:255', 'string'],
        'diagnose.lens' => ['nullable', 'max:255', 'string'],
        'diagnose.fundus' => ['nullable', 'max:255', 'string'],
        'diagnose.remarks' => ['nullable', 'max:255', 'string'],
        'diagnose.diagnosis' => ['nullable', 'max:255', 'string'],
        'diagnoseOct' => ['file', 'max:1024', 'nullable'],
        'diagnoseUs' => ['file', 'max:1024', 'nullable'],
        'diagnosePantacam' => ['file', 'max:1024', 'nullable'],
    ];

    public function mount(Patient $patient): void
    {
        $this->patient = $patient;
        $this->resetDiagnoseData();
    }

    public function resetDiagnoseData(): void
    {
        $this->diagnose = new Diagnose();

        $this->diagnoseOct = null;
        $this->diagnoseUs = null;
        $this->diagnosePantacam = null;
        $this->diagnose->eye = 'Left';

        $this->dispatchBrowserEvent('refresh');
    }

    public function newDiagnose(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.patient_diagnoses.new_title');
        $this->resetDiagnoseData();

        $this->showModal();
    }

    public function editDiagnose(Diagnose $diagnose): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.patient_diagnoses.edit_title');
        $this->diagnose = $diagnose;

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal(): void
    {
        $this->showingModal = false;
    }

    public function save(): void
    {
        $this->validate();

        if (!$this->diagnose->patient_id) {
            $this->authorize('create', Diagnose::class);

            $this->diagnose->patient_id = $this->patient->id;
        } else {
            $this->authorize('update', $this->diagnose);
        }

        if ($this->diagnoseOct) {
            $this->diagnose->OCT = $this->diagnoseOct->store('public');
        }

        if ($this->diagnoseUs) {
            $this->diagnose->US = $this->diagnoseUs->store('public');
        }

        if ($this->diagnosePantacam) {
            $this->diagnose->pantacam = $this->diagnosePantacam->store(
                'public'
            );
        }

        $this->diagnose->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Diagnose::class);

        collect($this->selected)->each(function (string $id) {
            $diagnose = Diagnose::findOrFail($id);

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
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetDiagnoseData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->patient->diagnoses as $diagnose) {
            array_push($this->selected, $diagnose->id);
        }
    }

    public function render(): View
    {
        return view('livewire.patient-diagnoses-detail', [
            'diagnoses' => $this->patient->diagnoses()->paginate(20),
        ]);
    }
}
