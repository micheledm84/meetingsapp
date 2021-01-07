<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeetingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        /*foreach ($this->users as $user) {
            
            $participants[] = "$user[name] $user[surname]";
        }*/

        return [
            'id' => $this->id,
            'room_id' => $this->room_id,
            'room' => $this->room->name,
            'description' => $this->description,
            'users_id' => $this->users()->pluck('id'),
            //'participants' => $this->users[0]['name'] . " " . $this->users[0]['surname'],
            'participants' => implode(", ", $this->users->map(function($user){
                return $user->name . " " . $user->surname;
            })->values()->all()),
            //'participants' => $participants,
            'date' => $this->date,
            'start' => $this->start,
            'end' => $this->end,
            //'is_active' => $this->is_active
        ];
        //return parent::toArray($request);
    }

    /*public function format_participants($participants)
    {
        $participants_imp = implode(", ", $participants);
        return $participants_imp;
    }*/
}
