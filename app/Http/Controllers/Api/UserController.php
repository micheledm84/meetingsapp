<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

use App\User;

class UserController extends Controller
{
    public function index() {
        //return User::all();
        return UserResource::collection(User::all());
    }
}
