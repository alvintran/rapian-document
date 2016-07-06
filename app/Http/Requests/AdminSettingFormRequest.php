<?php

namespace Nht\Http\Requests;

use Nht\Http\Requests\Request;

class AdminSettingFormRequest extends Request
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
            'title'    => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ];
    }
}
