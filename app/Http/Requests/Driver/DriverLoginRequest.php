<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;

class DriverLoginRequest extends FormRequest
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
        return [
            'email'=>'required|email',
            'password'=>'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'Email Field Is Required',
            'email.email'=>'Email Field Is InValid',
            'password.required'=>'Password Field Is Required',
            'password.min'=>'Password Field Is Less Than 8 digits',
        ];
    }

}
