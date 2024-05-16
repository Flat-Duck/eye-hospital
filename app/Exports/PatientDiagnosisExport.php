<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PatientDiagnosisExport implements FromCollection, WithHeadings, WithMapping
{
    private $diagnoses;
    private $counter = 0;

    public function __construct($diagnoses)
    {
        $this->diagnoses = $diagnoses;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->diagnoses;
    }

    public function map($diagnoses): array
    {
        return [
            
            '#' => $this->counter+=1,
            'Eye' => $diagnoses->eye,
            'BCVA' => $diagnoses->BCVA,
            'IOP' => $diagnoses->IOP,
            'LID' => $diagnoses->LID,
            'Conjunctiva' => $diagnoses->conjunctiva,
            'Cornea' => $diagnoses->cornea,
            'AC' => $diagnoses->AC,
            'IrisPupil' => $diagnoses->IrisPupil,
            'lens' => $diagnoses->lens,
            'Fundus' => $diagnoses->fundus,
            'Remarks' => $diagnoses->remarks,
            'Diagnosis' => $diagnoses->diagnosis,
        ];
    }

    public function headings(): array
    {
        // Define your headings for the diagnoses sheet
        return [
            '#',
            'Eye',
            'BCVA',
            'IOP',
            'LID',
            'Conjunctiva',
            'Cornea',
            'AC',
            'IrisPupil',
            'lens',
            'Fundus',
            'Remarks',
            'Diagnosis',
        ];
    }
}
