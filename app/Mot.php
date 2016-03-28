<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Mot extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'number',
        'email',
        'day',
        'month'
    ];

    protected $dates = ['deleted_at'];
}
