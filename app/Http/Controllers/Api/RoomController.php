<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RoomResource;

use App\Room;

use Validator;

class RoomController extends Controller
{
    public function index() {
        return RoomResource::collection(Room::all());
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response($validator->errors());
        } 

        $room = new Room();
        $room->name = $request->name;
        $room->save();
    }

    public function delete(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response($validator->errors());
        } 
        $room = Room::find( $request->id );
        $room->delete();
    }

    public function edit(Request $request) {
        //dd('dddd');
        //return $request;
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response($validator->errors());
        } 

        //return $request;
        
        $room = Room::find($request->id);

        $room->name = $request->name;

        $room->save();
    }
}
