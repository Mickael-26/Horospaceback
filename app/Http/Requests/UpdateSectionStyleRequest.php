<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionStyleRequest extends FormRequest
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
            'color_title' => ['nullable', 'string', 'hex_color'],
            'color_background' => ['nullable', 'string', 'hex_color'],
            'font_title' => ['nullable', 'string'],
            'img_background' => ['nullable', 'extensions:jpg,png,avif,webp'],
            'img_section' => ['nullable', 'extensions:jpg,png,avif,webp'],
            'section_content_id' => ['required', 'numeric', 'exists:section_contents,id']
        ];
    }
}
