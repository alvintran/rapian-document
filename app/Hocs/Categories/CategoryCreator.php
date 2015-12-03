<?php

namespace Nht\Hocs\Categories;

use Illuminate\Http\Request;
use Xss;

class CategoryCreator {

	protected $category;
	protected $request;

	public function __construct(CategoryRepository $category, Request $request)
	{
		$this->category = $category;
		$this->request  = $request;
		$this->pathName = '-';
	}

	public function createCategory(CategoryCreatorListener $listener, array $data)
	{
		$parent_id      = (int) array_get($data, 'parent_id');
		$data['level']  = 1;
		$data['active'] = (int) Category::ACTIVE;
		$data['slug']   =	removeTitle(array_get($data, 'name'));
		$category       = $this->category->create($data);

		if ($category) {
			$path = $this->pathName . $category->id . $this->pathName;
			if (isset($parent_id) && $parent_id > 0) {
				$parent = $this->category->getById($parent_id, ['path']);
				if (!empty($parent)) {
					$path            = $parent->path . $path;
					$tmp             = explode($this->pathName, $path);
					$category->level = (int)(count($tmp) - 1) / 2;
				}
			}
			$category->path = $path;

			if ($category->save()) {
				return $listener->creationSuccess();
			}
		}

		return $listener->creationFailed();
	}

}