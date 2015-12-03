<?php

namespace Nht\Http\Requests;

use Nht\Http\Requests\Request;

class AdminCategoryRequest extends Request
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
			'name'      => 'required',
			'type'      => 'integer|min:1'
		];
	}

	public function messages()
	{
		return [
			'name.required' => 'Vui lòng nhập tên danh mục',
			'type.min'      => 'Vui lòng chọn loại danh mục',
			'type.integer'  => 'Vui lòng chọn loại danh mục'
		];
	}
}
