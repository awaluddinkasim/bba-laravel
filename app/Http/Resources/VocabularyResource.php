<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VocabularyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'kata' => $this->kata,
            'latin' => $this->latin,
            'arti' => $this->arti,
            'contoh_kalimat' => $this->contoh_kalimat,
            'audio' => $this->audio
        ];
    }
}
