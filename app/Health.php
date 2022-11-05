<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    protected $table = 'user';
    protected $fillable = [           //指定存'name','weight','height','age','gender'
        'name', 'weight','height','age','gender'
    ];
}
