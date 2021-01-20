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
        $meeting = Meeting::where(function($q) {
            $q->where('start', '>=', $this->start)->where('end', '<=', $this->end)
            ->orWhere('start', '<', $this->end)->where('end', '>=', $this->end) 
            ->orWhere('start', '<=', $this->start)->where('end', '>', $this->start);
        })
        ->whereDate("date", $this->date)
        ->where('room_id', $value)
        ->first();

        if(!$meeting) {
            return true;
        }


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
