<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntroStyleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'color_title' => ['hex_color', 'nullable'],
            'color_year' => ['hex_color', 'nullable'],
            'color_small_text' => ['hex_color', 'nullable'],
            'color_background_nav' => ['hex_color', 'nullable'],
            'color_background_intro' => ['hex_color', 'nullable'],
            'font_title' => ['string', 'nullable'],
            'font_small_text' => ['string', 'nullable'],
            'font_year' => ['string', 'nullable'],
            'img_background_mobile_intro' => ['image'],
            'img_background_intro' => ['image'],
            'img_nav' => ['image'],
            'theme_id' => ['numeric', 'exists:themes,id']
        ];
    }
}
