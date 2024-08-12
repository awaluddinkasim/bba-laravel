<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PercakapanHarianResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'kalimat' => $this->kalimat,
            'arab' => $this->arab,
            'latin' => $this->latin,
            'audio' => $this->audio
        ];
    }
}
