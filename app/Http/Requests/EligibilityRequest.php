<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EligibilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'age_less_than' => ['required', 'integer', 'max:50'],
            'age_greater_than' => ['required', 'integer', 'min:25'],
            'last_login_days_ago' => ['required', 'integer', 'max:50'],
            'income_less_than' => ['required', 'integer', 'max:50000'],
            'income_greater_than' => ['required', 'integer', 'min:15000'],
        ];
    }
}
