<?php

namespace App\Http\Resources;

use App\Models\SectionContent;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionStylesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "sectionName" => SectionContent::select('section_contents.title')
                ->where('id', $this->section_content_id)
                ->first()
                ->title ?? null,
            "colorBackground" => $this->color_background,
            "colorTitle" => $this->color_title,
            "imagBackground" => $this->img_background,
            "fontTitle" => $this->font_title,
            "imgSection" => $this->img_section,
            "SectionContentId" => $this->section_content_id,

        ];
    }
}
