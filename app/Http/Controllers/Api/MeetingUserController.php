<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MeetingUserResource;

use App\MeetingUser;

class MeetingUserController extends Controller
{
    public function index() {
        //return MeetingUser::all();
        return MeetingUserResource::collection(MeetingUser::all());
    }
}
