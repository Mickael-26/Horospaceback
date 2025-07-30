<?php

namespace App\Http\Resources;

use App\Models\IntroContent;
use App\Models\SectionContent;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HoroscopeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $lang = [
            'fr' => 1,
            'en' => 2,
            'es' => 3,
            'de' => 4,
        ];
        $languageId = $lang[$request->lang] ?? 1; 
        return [
            'id' => $this->id,
            'category' => new CategoryResource($this->category),
            'medias' => new MediasResource($this->medias),
            'introStyle' => IntroStylesResource::collection(
                $this->introContents->flatMap(function ($intro) {
                    return $intro->introStyles;
                })
            ),
            'zodiacSignStyle' => new ZodiacSignStylesResource($this->zodiacSignStyle),
            'formContactStyle' => new FormContactStylesResource($this->formContactStyle),
            'intro' => IntroContentsResource::collection(IntroContent::where('theme_id', $this->id)
                ->where('language_id', $languageId)
                ->get()),
            'sections' => SectionContentsResource::collection(SectionContent::where('theme_id', $this->id)
                ->where('language_id', $languageId)
                ->get()),
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
