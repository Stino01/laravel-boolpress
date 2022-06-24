<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function category() {
        return $this->belongTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
