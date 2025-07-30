<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IntroStylesResource extends JsonResource
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
            'colorTitle' => $this->color_title,
            'colorYear' => $this->color_year,
            'colorSmallText' => $this->color_small_text,
            'colorBackgroundNav' => $this->color_background_nav,
            'colorBackgroundIntro' => $this->color_background_intro,
            'fontTitle' => $this->font_title,
            'fontSmallText' => $this->font_small_text,
            'fontYear' => $this->font_year,
            'imgBackgroundMobileIntro' => $this->img_background_mobile_intro,
            'imgNav' => $this->img_nav,
            'imgBackgroundIntro' => $this->img_background_intro,
        ];
    }
}
