<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'intro' => 'required|max:255',
            'event_year_month' => 'required|date',
        ];
    }

    public function attributes(): array
    {
        return [
            'intro' => trans('admin.abouts.outline'),
            'event_year_month' => trans('admin.abouts.year'),
        ];
    }

    public function prepareForValidation(): void
    {
        if (!empty($this->event_year_month)) {
            $this->merge([
                'event_year_month' => $this->event_year_month . "-01",
            ]);
        }
    }
}
