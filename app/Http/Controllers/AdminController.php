<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Permission;
use App\User;
use App\Room;
use App\Language;

//use App\Http\Resources\PermissionResource;
use App\Http\Resources\UserResource;

class AdminController extends Controller
{
    public function index()
    {
        $permissions = Permission::select('id')->get();

        $rooms = Room::all();

        $languages = Language::all();

        $users = UserResource::collection(User::all());

        return view('admin')->with(['permissions'=>$permissions, 'users'=>$users, 'rooms'=>$rooms, 'languages'=>$languages]);
    }
}
