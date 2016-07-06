<?php

namespace Nht\Http\Requests;

use Nht\Http\Requests\Request;

class FrontendRegistorRequest extends Request
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
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confimation' => 'same:password'
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'email.required'    => trans('admin/validation.email_required'),
            'email.email'       => trans('admin/validation.email_not_email'),
            'email.unique'      => 'Tài khoàn này đã tồn tại',
            'password.required' => trans('admin/validation.pwd_required'),
            'password.min' => 'Mật khẩu phải trên 6 ký tự',
            'password_confimation.same' => 'Xác nhận mật khẩu không đúng'
        ];
    }
}
