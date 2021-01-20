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
    public $participants;
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
        $users = Meeting::select(DB::raw("CONCAT(users.name, ' ', users.surname) AS fullname"))
            ->leftJoin('meeting_user', 'meetings.id', 'meeting_user.meeting_id')
            ->leftJoin('users', 'meeting_user.user_id', 'users.id')
            ->where(function($q) {
                $q->where('start', '<=', $this->start)->where('end', '>', $this->start)
                    ->orWhere('start', '<', $this->end)->where('end', '>=', $this->end)
                    ->orWhere('start', '>=', $this->start)->where('start', '<', $this->end);
            })
            ->whereDate("date", $this->date)
            ->whereIn('users.id', $value)
            ->get();

        if (!$users->first()) { 
            return true;
        }

        $this->participants = $users;

        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $return_text = 'The following users have already a meeting at that time: ';

        foreach($this->participants as $participant) {
            $return_text .= $participant->fullname;
            $return_text .= ', ';
        }

        $return_text = substr($return_text, 0, -2);

        $return_text .= '.';

        return $return_text;
        
    }
}
