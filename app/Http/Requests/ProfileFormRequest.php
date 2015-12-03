<?php

namespace Nht\Http\Requests;

use Nht\Http\Requests\Request;

class ProfileFormRequest extends Request
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
            'nickname'  => 'required'
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'email.required'    => trans('admin/validation.email_required'),
            'nickname.required' => 'Vui lòng nhập tên hiển thị',
            'email.email'       => trans('admin/validation.email_not_email'),
        ];
    }
}
