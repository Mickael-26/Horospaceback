<?php

namespace App\Http\Resources;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\ZodiacSign;
use App\Models\SubSectionContent;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionContentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $zodiacSignId = ZodiacSign::where('name', ucfirst($request->zodiacSignName))->first()->id;
        return [
            "id"=> $this->id,
            'title' => $this->title,
            "language_id" => $this->language_id,
            "subSections" =>  SubSectionContentsResource::collection(SubSectionContent::where('section_content_id', $this->id)
            ->where('zodiac_sign_id', $zodiacSignId)
            ->get())
        ];
    }
}
