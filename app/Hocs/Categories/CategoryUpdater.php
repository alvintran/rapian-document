<?php

namespace Nht\Hocs\Categories;

use Illuminate\Http\Request;
use Illuminate\Database\DatabaseManager as DBM;
use DB, Xss;

class CategoryUpdater {

	public function __construct(CategoryRepository $category, Request $request, DBM $db)
	{
		$this->category = $category;
		$this->request  = $request;
		$this->db 		 = $db;
		$this->pathName = '-';
	}

	public function updateCategory(CategoryUpdaterListener $listener, array $data, Category $category) {

		$parent_id    =	(int) array_get($data, 'parent_id');
		$data['slug'] =	removeTitle(array_get($data, 'name'));

		if (isset($parent_id) && $parent_id != $category->parent_id) {
			$parent = $this->category->getById($parent_id);
			if (! empty($parent) ) {
				if (strpos($parent->path, $category->path) === false || strpos($this->pathName . $parent->id . $this->pathName, $category->path) === false) {
					$data['path'] = $parent->path . $this->pathName . $category->id . $this->pathName;
					$tmp = explode($this->pathName, $data['path']);

					$level = (int)(count($tmp) - 1) / 2 - $category->level;

					DB::table('categories')->where('path', 'LIKE', $category->path . '%')
					->update([
						'level' 	=> $this->db->raw('`level` + ' . $level),
						'path' 	=> $this->db->raw('REPLACE(`path`, \'' . $category->path . '\', \'' . $data['path'] . '\')')
					]);
				}
			}else {
				$data['parent_id'] = 0;
				$data['path']      = $this->pathName . $category->id . $this->pathName;
				$data['level']     = 1;
			}
		}

		if ($this->category->update($data, ['id' => $category->id])) {
			return $listener->updationSuccess();
		}

		return $listener->updationFailed();
	}

	public function toggleActiveStatus(CategoryUpdaterListener $listener, Category $category)
	{
		if ($this->category->toggleActiveStatus($category)) {
			return $listener->toggleActiveStatusSuccess($category);
		}
		return $listener->toggleActiveStatusFailed();
	}
}