<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $title = "categories";
    protected $fillable = ["name"];

    function article()
    {
        return $this->hasMany(Article::class);
    }
}
