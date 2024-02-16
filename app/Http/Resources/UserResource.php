<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
    public function toArray($request)
    {
        $name = $this->name;
        $name_array = explode(' ', trim($name));
        $firstWord = $name_array[0];
        $lastWord = $name_array[count($name_array) - 1];
        $initials = mb_substr($firstWord[0], 0, 1) . "" . mb_substr($lastWord[0], 0, 1);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'verified' => $this->email_verified_at,
            'joined' => $this->created_at->format("d F, Y"),
            'initials' => $initials,
            'is_admin' => $this->hasRole('admin'),
            'is_moderator' => $this->hasRole('moderator'),
            'is_guest' => $this->hasRole('guest'),
            'has_role' => $this->roles()->exists()
        ];
    }
    }
}
