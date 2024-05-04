<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use App\Models\Scopes\UserHospitalScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hospital extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name'];

    protected $searchableFields = ['*'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    protected static function booted()
    {
        static::addGlobalScope(new UserHospitalScope);
    }
}
