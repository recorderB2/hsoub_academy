<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\LessonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'Full Name' => $this->name,
            'Email Adress' => $this->email,
            'Role' => $this->role,
            'Lessons' => LessonResource::collection($this->lessons),
        ];
    }
}
