<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'alternate_name', 'age', 'gender', 'smoker', 'zip', 'travel_distance', 'underlying_conditions'
    ];
}
