<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PatientFullExport implements WithMultipleSheets
{
    private $patient;

    public function __construct($patient)
    {
        $this->patient = $patient;
    }

    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new PatientInfoExport($this->patient);

        $sheets[] = new PatientDiagnosisExport($this->patient->diagnoses);

        return $sheets;
    }
}
