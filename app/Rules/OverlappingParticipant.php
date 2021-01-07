<?php

namespace App\Rules;

use DB;

use Illuminate\Contracts\Validation\Rule;

use App\Meeting;
use App\MeetingUser;
use App\User;

class OverlappingParticipant implements Rule
{
    public $start;
    public $end;
    public $date;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start, $end, $date)
    {
        $this->start = $start;
        $this->end = $end;
        $this->date = $date;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //dd($this->start, $this->end, $this->date, $value);

        $users = array();

        foreach($value as $user) {

            /*$start_meetings = Meeting::where('start', '<', $this->start)->where('end', '>', $this->start)->whereDate("date", $this->date)->first();
            $end_meetings = Meeting::where('start', '<', $this->end)->where('end', '>', $this->end)->whereDate("date", $this->date)->first();
            $long_meetings = Meeting::where('start', '>', $this->start)->where('end', '<', $this->end)->whereDate("date", $this->date)->first();*/

            $users = Meeting::select(DB::raw("CONCAT('users.name','users.surname') AS fullname"))
                ->leftJoin('meeting_user', 'meetings.id', 'meeting_user.meeting_id')
                ->leftJoin('users', 'meeting_user.user_id', 'users.id')
                //->whereNull('orders.customer_id')
                //->get();
                ->first();

            //dd($users);

            //dd($start_meetings, $end_meetings, $long_meetings);

            /*if(!$start_meetings && !$end_meetings && !$long_meetings) {
                array_push($users, $user);
            }*/
        }

        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
