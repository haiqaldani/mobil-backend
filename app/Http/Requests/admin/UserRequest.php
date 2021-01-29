<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
            'firstname' => 'max:255',
            'lastname' => 'max:255',
            'email' => 'required|unique:users,email_address',
            'phone_number' => 'max:14',
            'province' => 'max:255',
            'city' => 'max:255',
            'roles_id' => 'required',
            'username' => 'required|unique:users',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'firstname.max:255'    => 'Judul iklan harus diisi',
        ];
    }
}
