<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Page extends Model
{

use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'url',
        'metaDescription',
        'content',
        'hidden',
        'live',
        'page_id',
    ];

    protected $dates = ['deleted_at'];


    public function children()
    {
    	return $this->hasMany('App\Page', 'page_id');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image');
    }

}
