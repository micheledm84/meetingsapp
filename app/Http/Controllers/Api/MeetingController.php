<?php

namespace App\Http\Controllers\Api;

use App\Rules\EndBeforeStartDate;
use App\Rules\EndBeforeStartHour;
use App\Rules\OverlappingMeeting;
use App\Rules\OverlappingParticipant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MeetingResource;

use App\Meeting;
use App\MeetingUser;

use Carbon\Carbon;

use Validator;

class MeetingController extends Controller
{
    public function index() {
        return MeetingResource::collection(Meeting::all());
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
        //$this->validate($request, [
            'room' => ['required', new OverlappingMeeting($request->start, $request->end, $request->date)],
            'description' => 'required|min:10',
            'date' => 'required',
            'start' => 'required',
            'end' => ['required', new EndBeforeStartHour($request->start, $request->end, $request->room)],
            'participants' => ['required', new OverlappingParticipant($request->start, $request->end, $request->date)],
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

        //return "The meeting has been inserted";
    }

    public function get_report(Request $request) {
        //dd($request);

        $validator = Validator::make($request->all(), [
            'room' => 'required',
            'start' => 'required',
            'end' =>  ['required', new EndBeforeStartDate($request->start, $request->end)],
            'participant' => 'required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 422);
        } 

        $room = $request->room;
        $start = $request->start;
        $end = $request->end;
        $participant = $request->participant;


        //dd($start);
        //$start = Carbon::createFromFormat('d/m/Y', $start)->format('Y-m-d');
        //$start = Carbon::createFromFormat('Y-m-d', $start)->format('Y-m-d');
        //dd($start);
        //return $start;
        
        

        $meetings = Meeting::select('meetings.id as id', 'meeting_user.user_id as user', 'meetings.description as description', 'meetings.room_id as room_id', 'meetings.date as date', 'meetings.start as start', 'meetings.end as end')
            ->leftJoin('meeting_user', 'meetings.id', '=', 'meeting_user.meeting_id')
            ->leftJoin('users', 'meeting_user.user_id', '=', 'users.id')
            ->whereDate("date", '>=', $start)
            ->whereDate("date", '<=', $end)
            ->where("users.id", '=', $participant)
            ->where("meetings.room_id", '=', $room)
            ->get();
            //->pluck('meetings.id', 'meeting_user.user_id', 'meetings.description', 'meetings.room_id', 'meetings.date', 'meetings.start', 'meetings.end');

            /*'participants' => implode(", ", $this->users->map(function($user){
                return $user->name . " " . $user->surname;
            })->values()->all()),*/

        //return $meetings;
        return MeetingResource::collection($meetings);
        //return 'viva';
    }
    
}
