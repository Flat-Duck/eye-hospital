<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiagnoseUpdateRequest extends FormRequest
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
            'patient_id' => ['required', 'exists:patients,id'],
            'eye' => ['required', 'in:left,right'],
            'BCVA' => ['nullable', 'max:255', 'string'],
            'IOP' => ['nullable', 'max:255', 'string'],
            'LID' => ['nullable', 'max:255', 'string'],
            'conjunctiva' => ['nullable', 'max:255', 'string'],
            'cornea' => ['nullable', 'max:255', 'string'],
            'AC' => ['nullable', 'max:255', 'string'],
            'IrisPupil' => ['nullable', 'max:255', 'string'],
            'lens' => ['nullable', 'max:255', 'string'],
            'fundus' => ['nullable', 'max:255', 'string'],
            'remarks' => ['nullable', 'max:255', 'string'],
            'diagnosis' => ['nullable', 'max:255', 'string'],
            'OCT' => ['file', 'max:1024', 'nullable'],
            'US' => ['file', 'max:1024', 'nullable'],
            'pantacam' => ['file', 'max:1024', 'nullable'],
        ];
    }
}
