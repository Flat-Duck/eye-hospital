<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', 'string'],
            'birth_date' => ['required', 'date'],
            'n_id' => ['required', 'max:255'],
            'gender' => ['required', 'in:male,female,other'],
            'phone' => ['required', 'max:255', 'string'],
            'escort_phone' => ['required', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'category' => ['required', 'max:255', 'string'],
            'hospital_id' => ['required', 'exists:hospitals,id'],
            'CO' => ['nullable', 'max:255', 'string'],
            'PMH' => ['nullable', 'max:255', 'string'],
            'PSH' => ['nullable', 'max:255', 'string'],
            'DM' => ['nullable', 'max:255', 'string'],
            'BP' => ['nullable', 'max:255', 'string'],
        ];
    }
}
