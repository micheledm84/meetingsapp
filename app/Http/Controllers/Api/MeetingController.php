<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MeetingResource;

use App\Meeting;
use App\MeetingUser;

use Validator;

class MeetingController extends Controller
{
    public function index() {
        return MeetingResource::collection(Meeting::all());
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'room' => 'required',
            'description' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'participants' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response($validator->errors());
        } 

        $meeting = new Meeting();
        $meeting->room_id = $request->room;
        $meeting->description = $request->description;
        $meeting->date = $request->date;
        $meeting->start = $request->start;
        $meeting->end = $request->end;
        $meeting->save();
        
        $meeting->users()->attach($request->participants);
    }

    public function get_report(Request $request) {
        //dd($request);

        $validator = Validator::make($request->all(), [
            'room' => 'required',
            'start' => 'required',
            'end' => 'required',
            'participant' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response($validator->errors());
        } 

        //return 'viva';
    }
    
}
