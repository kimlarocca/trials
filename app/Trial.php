<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    protected $fillable = [
        'user_id', 'ncit', 'title'
    ];
}
