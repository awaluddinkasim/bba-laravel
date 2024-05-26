<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MateriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'judul' => $this->judul,
            'konten' => $this->konten,
            'excerpt' => Str::limit(strip_tags($this->konten), 100),
            'id_youtube' => explode('/', $this->url_youtube)[array_key_last(explode('/', $this->url_youtube))],
        ];
    }
}
