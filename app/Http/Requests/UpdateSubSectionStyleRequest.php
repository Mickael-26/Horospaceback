<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubSectionStyleRequest extends FormRequest
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
            'list_dates' => ['nullable','array'],
            'list_numbers' => ['array','nullable'],
            'lucky_number' => ['numeric', 'nullable'],
            'color_title' => ['hex_color', 'nullable'],
            'color_sub_title' => ['hex_color', 'nullable'],
            'color_sub_paragraph' => ['hex_color', 'nullable'],
            'color_lucky_number' => ['hex_color', 'nullable'],
            'border_color_lucky_number' => ['hex_color', 'nullable'],
            'color_list_numbers' => ['hex_color', 'nullable'],
            'color_list_dates' => ['hex_color', 'nullable'],
            'font_title' => ['string', 'nullable'],
            'font_sub_title' => ['string', 'nullable'],
            'font_paragraph' => ['string', 'nullable'],
            'sub_section_content_id' => ['string', 'nullable'],
            'img' => ['image', 'nullable']
        ];
    }
}
