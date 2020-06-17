<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = \App\Employee::$rules;
        $rules['email'] = 'nullable|email|unique:employees,email,'.$this->route('employee');
        $rules['phone'] = 'nullable|string|unique:employees,phone,'.$this->route('employee');
        return $rules;
    }
}
