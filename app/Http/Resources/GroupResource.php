<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'plan' => $this->plan()->exists() ? $this->plan->only(['id', 'title']) : null,
            'students' => $this->students->map(function ($student) {
                return $student->only(['id', 'name', 'email']);
            }),
        ];
    }
}
