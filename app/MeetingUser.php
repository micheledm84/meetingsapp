<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class MeetingUser extends Model
{
    use SoftDeletes;
    
    protected $table = 'meeting_user';
}
