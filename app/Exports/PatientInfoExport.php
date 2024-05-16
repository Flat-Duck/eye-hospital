<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientInfoExport implements FromCollection, WithHeadings, WithMapping
{
    private $patient;
    
    public function __construct($patient)
    {
        $this->patient = $patient;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect([$this->patient]);
    }

    public function map($patient): array
    {
        return [
            'Name' => $patient->name,
            'Date of birth' => $patient->birth_date->format("m-d-y"),
            'National number' => $patient->n_id,
            'Gender' => $patient->gender,
            'Phone' => $patient->phone,
            'Escort Phone' => $patient->escort_phone,
            'City' => optional($patient->city)->name,
            'Classification' => $patient->category,
            'Hospital' => optional($patient->hospital)->name,
        ];
    }
    public function headings(): array
    {
        // Define your headings for the patient profile sheet
        return [
            'Name',
            'Date of birth',
            'National number',
            'Gender',
            'Phone',
            'Escort Phone',
            'City',
            'Classification',
            'Hospital',
        ];
    }
}
