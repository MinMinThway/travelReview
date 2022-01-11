<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $title = "articles";
    protected $fillabel =  ["name", "review", "cat_id", "read_time", "image"];

    function category()
    {
        return $this->belongsTo(Category::class, "cat_id");
    }

    function comments(){
        return $this->hasMany(Comment::class);
    }

    function likeDislikes(){
        return $this->hasMany(LikeDislike::class);
    }
}
