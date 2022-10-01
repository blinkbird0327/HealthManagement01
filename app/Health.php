<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    protected $table = 'user';
    protected $fillable = [
        'id', 'name', 'weight'
    ];
}
