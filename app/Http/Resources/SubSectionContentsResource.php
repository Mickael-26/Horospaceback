<?php

namespace App\Http\Resources;

use App\Models\Language;
use App\Models\SubSectionContent;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ZodiacSign;

class SubSectionContentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'title' => $this->title,
            'subTitle' => $this->sub_title,
            'paragraph' => $this->paragraph,
            'section_id' => $this->section_content_id,
            'zodiacSignName' => ZodiacSign::find($this->zodiac_sign_id)->name,
        ];
    }
}
