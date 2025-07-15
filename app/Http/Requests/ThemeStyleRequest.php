<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeStyleRequest extends FormRequest
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
            'color_name' => ['hex_color'],
            'color_background' => ['hex_color'],
            'font' => 'string',
            'color_text' => ['hex_color'],
            'color_background_form' => ['hex_color'],
            'img_theme' => ['extensions:jpg,png,avif,webp'],
            'theme_id' => ['numeric', 'exists:themes,id']
        ];
    }
}
