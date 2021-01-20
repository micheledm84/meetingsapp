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

        $current_date = date('Y-m-d');
        $current_time = date('H:i');

        $meeting_home = Meeting::where(function($q) use ($current_date, $current_time) {
                $q  ->whereDate('date', '>', $current_date)
                    ->orWhereDate('date', $current_date)->whereDate('end', '>=', $current_time);
            })
            ->orderBy('date', 'ASC')
            ->orderBy('start', 'ASC')
            ->orderBy('end', 'ASC')
            ->get();

        return MeetingResource::collection($meeting_home);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
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

    }

    public function get_report(Request $request) {

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

        $meetings = Meeting::select('meetings.id as id', 'meeting_user.user_id as user', 'meetings.description as description', 'meetings.room_id as room_id', 'meetings.date as date', 'meetings.start as start', 'meetings.end as end');
        $meetings = $meetings->leftJoin('meeting_user', 'meetings.id', '=', 'meeting_user.meeting_id');
        $meetings = $meetings->leftJoin('users', 'meeting_user.user_id', '=', 'users.id');
        $meetings = $meetings->whereDate("date", '>=', $start);
        $meetings = $meetings->whereDate("date", '<=', $end);
        if($participant !== '0') {
            $meetings = $meetings->where("users.id", '=', $participant);
        }
        if($room !== '0') {
            $meetings = $meetings->where("meetings.room_id", '=', $room);
        }
        $meetings = $meetings->get();

        return MeetingResource::collection($meetings);
    }
    
}
