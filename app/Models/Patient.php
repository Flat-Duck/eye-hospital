<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'birth_date',
        'n_id',
        'gender',
        'phone',
        'escort_phone',
        'city_id',
        'category',
        'hospital_id',
        'CO',
        'PMH',
        'PSH',
        'DM',
        'BP',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnose::class);
    }

    public static function men()
    {
        return Patient::where('gender', '=', 'male')->get();
    }
    public static function women()
    {
        return Patient::where('gender', '=', 'female')->get();
    }

    public static function children()
    {
        return Patient::where('birth_date', '>', now()->subYears(18))->get();
    }

    public static function complete()
    {
        return Patient::has('diagnoses');
    }

    

}
