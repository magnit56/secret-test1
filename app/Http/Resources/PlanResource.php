<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
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
            'title' => $this->title,
            'group' => $this->group()->exists() ? $this->group->only(['id', 'title']) : null,
            'lectures' => $this->lectures->map(function ($lecture) {
                return $lecture->only(['id', 'topic', 'description']);
            }),
        ];
    }
}
