<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
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
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required', 'string', 'max:255', Rule::unique('contacts', 'name')->ignore($this->route('contact'))],
            'url' => 'nullable|url',
            'has_qrcode' => 'required|boolean',
            'qr_code' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'show_hero' => 'required|boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'show_hero' => $this->has('show_hero') ? true : false,
            'has_qrcode' => $this->has('has_qrcode') ? true : false,
        ]);
    }
}
