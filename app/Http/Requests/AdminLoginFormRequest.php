<?php

namespace Nht\Http\Requests;

use Nht\Http\Requests\Request;

class AdminLoginFormRequest extends Request
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
            'email' => 'required|email',
            'password' => 'required'
        ];

        if ($this->is('/login')) {
            $rules['email'] .= '|exists:users';
        }

        return $rules;
    }

    public function messages()
    {
    	return [
			'email.required'    => trans('admin/validation.email_required'),
			'email.email'       => trans('admin/validation.email_not_email'),
            'email.exists'      => 'Tài khoàn này không tồn tại',
			'password.required' => trans('admin/validation.pwd_required')
    	];
    }
}
