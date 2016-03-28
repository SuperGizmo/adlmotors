<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class image extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name', 'location'
    ];

    public function page()
    {
        return $this->belongsToMany('App\Page');
    }
}