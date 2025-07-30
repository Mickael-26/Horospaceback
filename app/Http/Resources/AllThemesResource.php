<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllThemesResource extends JsonResource
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
            'intro' => IntroContentsResource::collection($this->introContents),
            'themeContents' => ThemeContentsResource::collection($this->themeContents),
        ];
    }
}
