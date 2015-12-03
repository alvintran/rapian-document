<?php

namespace Nht\Hocs\Categories;

use Illuminate\Http\Request;

class CategoryDeleter {

	protected $category;

	public function __construct(CategoryRepository $category)
	{
		$this->category = $category;
	}

	/**
	 * Xử lý xóa danh mục
	 * @return [type] [description]
	 */
	public function deleteCategory(CategoryDeleterListener $listener, Category $category)
	{
		if ($this->category->removeCategory($category)) {
			return $listener->deletionSuccess();
		}

		return $listener->deletionFailed();
	}
}