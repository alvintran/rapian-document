<?php

namespace Nht\Http\Requests;

use Nht\Http\Requests\Request;

class AdminUserFormRequest extends Request
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
        $rules = [
            'email'    => 'required|email',
            'password' => 'required|min:6',
            'confimation_password' => 'same:password',
            'nickname' => 'required',
            'name'     => 'required',
            'phone'    => 'required',
            'address'  => 'required'
        ];

        if ($this->is('admin/users')) {
            $rules['email'] .= '|unique:users';
        }

        if ($this->is('admin/profile')) {
            unset($rules['email']);
            unset($rules['password']);
        }

        return $rules;
    }
}
