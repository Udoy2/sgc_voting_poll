<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guard = [];
    protected $fillable = [
        'name', 'subject' , 'sector','profile'
    ];
}
