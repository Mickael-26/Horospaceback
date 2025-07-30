<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubSectionStylesResource extends JsonResource
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
            'listDates' => $this->list_dates,
            'listNumbers' => $this->list_numbers,
            'luckyNumber' => $this->lucky_number,
            'img' => $this->img,
            'colorTitle' => $this->color_title,
            'colorSubTitle' => $this->color_sub_title,
            'colorSubParagraph' => $this->color_sub_paragraph,
            'fontTitle' => $this->font_title,
            'fontSubTitle' => $this->font_sub_title,
            'fontParagraph' => $this->font_paragraph,
            'colorLuckyNumber' => $this->color_lucky_number,
            'borderColorLuckyNumber' => $this->border_color_lucky_number,
            'colorListNumbers' => $this->color_list_numbers,
            'colorListDates' => $this->color_list_dates,
            'subSectionContentId' => $this->sub_section_content_id,
        ];
    }
}
