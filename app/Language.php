<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use SoftDeletes;

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
