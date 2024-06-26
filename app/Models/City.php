<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name'];

    protected $searchableFields = ['*'];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function hospitals()
    {
        return $this->hasMany(Hospital::class);
    }
}
