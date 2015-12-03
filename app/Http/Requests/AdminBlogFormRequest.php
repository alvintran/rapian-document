<?php

namespace Nht\Http\Requests;

use Nht\Http\Requests\Request;

class AdminBlogFormRequest extends Request
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
            'title' => 'required',
            'teaser' => 'required',
            'image' => 'image',
            'content' => 'required',
            'active' => '',
            'hot' => ''
        ];

        if ($this->is('admin/blogs')) {
            $rules['image'] .= '|required';
        }
        return $rules;
    }
}
