<?php

namespace App\Http\Resources;

use App\Models\ListenedLecture;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'group' => $this->group()->exists() ? $this->group->only(['id', 'title']) : null,
            'listened lectures' => $this->studentListens->map(function ($studentListen) {
                return $studentListen->lecture->only(['id', 'topic', 'description']);
            }),
        ];
    }
}
