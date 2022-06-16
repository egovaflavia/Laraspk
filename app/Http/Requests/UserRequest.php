<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
        ];
    }

    // public function response(array $errors)
    // {
    //     return redirect()->back()->withErrors($errors)->withInput();
    // }
}
