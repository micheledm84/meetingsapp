<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'//, 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    /*protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    public function meetings()
    {
        return $this->belongsToMany('App\Meeting')->withTimestamps();
    }

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }

    /*protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            //'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'created_by' => $data['email'],
            //'phone_no'  => $data['phone_no'],
        ]);

        return redirect('home')->with('message', 'User registered!');
    }*/
}
