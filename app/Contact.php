<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'firstName',
        'surname',
        'contactNumber',
        'firstLineAddress',
        'secondLineAddress',
        'thirdLineAddress',
        'city',
        'county',
        'postcode',
        'question',
        'email',
        'newsletter'
    ];
}
