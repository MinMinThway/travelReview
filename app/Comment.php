<?php

namespace App;

use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $title = "comment";
    protected $fillable = ["article_id", "user_id", "comment"];

    function Article(){
        return $this->belongsTo(Article::class, "article_id");
    }

    function User(){
        return $this->belongsTo(User::class,"user_id");
    }

}
