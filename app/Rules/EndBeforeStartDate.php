<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use Carbon\Carbon;

class EndBeforeStartDate implements Rule
{
    public $start;
    public $end;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
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
        $start = Carbon::createFromFormat('Y-m-d', $this->start);   
        $end = Carbon::createFromFormat('Y-m-d', $this->end);   

        /*if($end->greaterThan($start)){
            return true;
        }*/

        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The end date must be after the start date.';
    }
}
