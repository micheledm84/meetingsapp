<?php

namespace App\Rules;

use App\Meeting;

use Illuminate\Contracts\Validation\Rule;

class OverlappingMeeting implements Rule
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
        //dd($this->start); //02:15
        //dd($this->end); //02:15
        //dd($this->room); //1
        //dd($this->date); //"2021-01-21"
        $start_meetings = Meeting::where('start', '<', $this->start)->where('end', '>', $this->start)->where('room_id', $value)->whereDate("date", $this->date)->first();
        $end_meetings = Meeting::where('start', '<', $this->end)->where('end', '>', $this->end)->where('room_id', $value)->whereDate("date", $this->date)->first();
        $long_meetings = Meeting::where('start', '>', $this->start)->where('end', '<', $this->end)->where('room_id', $value)->whereDate("date", $this->date)->first();

        //dd($start_meetings, $end_meetings, $long_meetings);

        if(!$start_meetings && !$end_meetings && !$long_meetings) {
            return true;
        }

        //return false;



    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The room is already occupied at that time.';
    }
}
