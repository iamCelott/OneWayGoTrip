<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripPackageRequest extends FormRequest
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
            'trip_id' => 'required|exists:trips,id',
            'package_id' => 'required|exists:packages,id',
            'include' => 'required|string',
            'exclude' => 'required|string',
            'itinerary' => 'required|string',
            'notes' => 'nullable|string'
        ];
    }
}
