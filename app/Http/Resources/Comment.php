<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Comment
 * @property Carbon $created_at
 * @package App\Http\Resources
 */
class Comment extends JsonResource
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
            'user' => new User($this->whenLoaded('user')),
            'text' => $this->text,
            'time' => $this->created_at->diffForHumans(),
            'created_at' => $this->created_at,
            'is_mine' => auth()->id() === $this->user->id
        ];
    }
}
