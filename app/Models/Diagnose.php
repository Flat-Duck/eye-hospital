<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diagnose extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'eye',
        'BCVA',
        'IOP',
        'LID',
        'conjunctiva',
        'cornea',
        'AC',
        'IrisPupil',
        'lens',
        'fundus',
        'remarks',
        'diagnosis',
        'US',
        'OCT',
        'pantacam',
        'patient_id',
    ];

    protected $searchableFields = ['*'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
