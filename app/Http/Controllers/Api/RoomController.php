<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RoomResource;

use App\Room;

class RoomController extends Controller
{
    public function index() {
        //return MeetingUser::all();
        return RoomResource::collection(Room::all());
    }
}
