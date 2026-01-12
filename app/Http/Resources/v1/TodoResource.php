<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'details' => $this->details,
            'completed' => $this->completed,
            'created_at' => Carbon::parse($this->created_at)->format('d.m.Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d.m.Y'),
        ];
    }
}
