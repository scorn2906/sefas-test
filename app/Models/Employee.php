<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'position_id',
        'city_id'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

