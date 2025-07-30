<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\InfoHoroscopeRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\FormContactStylesResource;
use App\Http\Resources\IntroContentsResource;
use App\Http\Resources\IntroStylesResource;
use App\Http\Resources\MediasResource;
use App\Http\Resources\SectionContentsResource;
use App\Http\Resources\SectionStylesResource;
use App\Http\Resources\SubSectionContentsResource;
use App\Http\Resources\SubSectionStylesResource;
use App\Http\Resources\ZodiacSignStylesResource;
use App\Models\IntroContent;
use App\Http\Resources\ZodiacSignsResource;
use App\Models\Language;
use App\Models\SectionContent;
use App\Models\Theme;
use App\Models\ZodiacSign;
use Illuminate\Http\JsonResponse;

class ApiHoroscopeController extends Controller
{
    /**
     * Summary of getTheme
     * @param int $id
     * @param string $zodiacSignName
     * @param string $lang
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function getTheme(InfoHoroscopeRequest $request): JsonResponse
    {
        
        $validated = $request->validated();
      
        $languageId = Language::where('code', $validated['lang'])->first()->id;
        $themeId = Theme::find($validated['id']);

        if ($themeId->status != 'active') {
            return response()->json([
                'message' => 'No data found'
            ]);
        }
        $zodiacSign = ZodiacSignsResource::collection(ZodiacSign::where('language_id', $languageId)->get());
        $category = new CategoryResource($themeId->category);
        $medias = new MediasResource($themeId->medias);
        $introStyle = new IntroStylesResource($themeId->introContents->first()?->introStyles->first());
        $zodiacSignStyle = new ZodiacSignStylesResource($themeId->zodiacSignStyle);
        $formContactStyle = new FormContactStylesResource($themeId->formContactStyle);
        $introId = IntroContent::where('theme_id', $themeId->id)
            ->where('language_id', $languageId)
            ->first();
        $intro = new IntroContentsResource($introId);
        $sections = SectionContentsResource::collection(SectionContent::where('theme_id', $themeId->id)
            ->where('language_id', $languageId)
            ->get());
        $sectionStyle = SectionStylesResource::collection(
            $themeId->sectionContents->flatMap(function ($section) {
                return $section->sectionStyles;
            })
        );
        $subSectionStyle = SubSectionStylesResource::collection(
            $themeId->sectionContents
                ->flatMap(function ($section) {
                    return $section->subSectionContents;
                })
                ->flatMap(function ($subSection) {
                    return $subSection->subSectionStyles;
                })
        );
        return response()->json([
            'zodiacsign' => $zodiacSign,
            'category' => $category,
            'medias' => $medias,
            'introStyle' => $introStyle,
            'zodiacSignStyle' => $zodiacSignStyle,
            'formContactStyle' => $formContactStyle,
            'intro' => $intro,
            'sections' => $sections,
            'sectionStyle' => $sectionStyle,
            'subSectionStyle' =>  $subSectionStyle
        ]);
    }
}
