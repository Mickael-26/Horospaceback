<?php

namespace App\Http\Resources;

use App\Models\FormContactStyles;
use App\Models\IntroStyle;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThemesResource extends JsonResource
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
            'status' => $this->status,
            'category' => new CategoryResource($this->category),
            'medias' => new MediasResource($this->medias),
            'introStyle' => IntroStylesResource::collection(
                $this->introContents->flatMap(function ($intro) {
                    return $intro->introStyles;
                })
            ),
            'zodiacSignStyle' => new ZodiacSignStylesResource($this->zodiacSignStyle),
            'formContactStyle' => new FormContactStylesResource($this->formContactStyle),
            'intro' => IntroContentsResource::collection($this->introContents),
            'themeContents' => ThemeContentsResource::collection($this->themeContents),
            'sections' => SectionContentsResource::collection($this->sectionContents),
            'sectionStyle' => SectionStylesResource::collection(
                $this->sectionContents->flatMap(function ($section) {
                    return $section->sectionStyles;
                })
            ),
            'subsectionStyle' => SubSectionStylesResource::collection(
                $this->sectionContents
                    ->flatMap(function ($section) {
                        return $section->subSectionContents ?? collect();
                    })
                    ->flatMap(function ($subSection) {
                        return $subSection->subSectionStyles ?? collect();
                    })
            ), 
        ];
    }
}
