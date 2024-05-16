<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientsExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;
    private $counter = 0;

    public function collection()
    {
        return Patient::all();
    }

    public function map($patient): array
    {
        return [
            '#' => $this->counter+=1,
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
        return [
            '#',
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
