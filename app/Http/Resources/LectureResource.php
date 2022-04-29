<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array|Arrayable
    {
        return [
            'id' => $this->id,
            'topic' => $this->topic,
            'description' => $this->description,
            'groups' => $this->groupListens->map(function ($groupListen) {
                return $groupListen->group->only(['id', 'title']);
            }),
            'students' => $this->studentListens->map(function ($studentListen) {
                return $studentListen->student->only(['id', 'name', 'email']);
            }),
        ];
    }
}
