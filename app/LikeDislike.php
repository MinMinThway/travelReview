<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    protected $title = "like_dislikes";
    protected $fillable = ["article_id", "user_id", "status"];
}
