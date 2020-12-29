<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MeetingUserResource extends JsonResource
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
            'meeting_id' => $this->meeting_id,
            'user_id' => $this->user_id
        ];
            

        //}
        //return parent::toArray($request);
    }
}
