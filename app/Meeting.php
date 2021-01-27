<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
    use SoftDeletes;

    protected $casts = [
        'start' => 'hh:mm',
        'end' => 'hh:mm'
        /*'start' => 'H:i',
        'end' => 'H:i'*/
        
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    /*public function permission()
    {
        return $this->belongsTo('App\Permission');
    }*/

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    /*public function setStartAttribute($value) {
        $this->attributes['start'] = (new Carbon($value))->format('H:i');
    }

    public function getStartAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('H:i:s', $date)->format('H:i');
    }*/
}
