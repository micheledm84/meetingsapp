<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'surname' => $this->surname,
            'fullname' => $this->name . ' ' . $this->surname,
            'email' => $this->email,
            'password' => $this->password,
            'permission' => $this->permission,
            //'is_active' => $this->is_active
        ];
        //return parent::toArray($request);
    }
}
