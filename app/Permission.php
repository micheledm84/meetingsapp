<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    /*public function meetings()
    {
        return $this->hasMany('App\Meeting');
    }*/

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
