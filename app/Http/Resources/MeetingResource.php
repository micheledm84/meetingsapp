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

        return [
            'id' => $this->id,
            'room_id' => $this->room_id,
            'room' => $this->room->name,
            'description' => $this->description,
            'users_id' => $this->users()->pluck('id'),
            'participants' => implode(", ", $this->users->map(function($user){
                return $user->name . " " . $user->surname;
            })->values()->all()),
            'date' => $this->date,
            'start' => $this->start,
            'end' => $this->end,
        ];
    }
}
