<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HearFromOurHappyCustomerResource extends JsonResource
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
            'title_user' => $this->title_user,
            'name' => $this->name,
            'description' => $this->description,
            'image_url' => $this->image_url,
            'rating' => $this->rating,
        ];
    }
}
