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
            'gender' => ['required', 'in:male,female'],
            'phone' => ['required', 'digits:10','numeric','starts_with:09',],
            'escort_phone' => ['required', 'digits:10','numeric','starts_with:09',],
            'city_id' => ['required', 'exists:cities,id'],
            'category' => ['required', 'max:255', 'string'],
            'hospital_id' => ['required', 'exists:hospitals,id'],
        ];
    }
}
