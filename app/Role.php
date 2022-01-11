<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $title = "roles";
    protected $fillabel = ["name"];

    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\RoleUser')->withPivot("role_users");
    }
}
