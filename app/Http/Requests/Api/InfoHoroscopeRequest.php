<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class InfoHoroscopeRequest extends FormRequest
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
            'id' => ['required', 'integer', 'exists:themes,id'],
            'zodiacSignName' => ['required', 'string'],
            'lang' => ['required', 'string', 'in:fr,en,es,de'],
        ];
    }
    /**
     * Summary of validationData
     * @return array
     */
    public function validationData(): array
    {
        return array_merge($this->all(), $this->route()->parameters());
    }
}
