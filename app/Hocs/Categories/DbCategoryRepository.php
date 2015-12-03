<?php

namespace Nht\Hocs\Categories;

use Nht\Hocs\Core\BaseRepository;
use Nht\Hocs\Categories\Category;
use Illuminate\Database\DatabaseManager as DBM;
use Request;

class DbCategoryRepository extends BaseRepository implements CategoryRepository
{

	protected $model;

	public function __construct(Category $model, DBM $db) {
		$this->model    = $model;
		$this->html     = '&rarr; ';
		$this->maskData = array();
		$this->maskDataAll = array();
		$this->maskDataHeader = '';
		$this->db       = $db;
	}

	public function getListTypeByCategory()
	{
		return [
			Category::PRODUCT    => 'Sản phẩm',
			Category::PAGESTATIC => 'Trang tĩnh',
			Category::NEWS       => 'Tin tức',
			Category::OTHER      => 'Khác',
		];
	}

	/**
	 * Hàm lấy tất cả các danh mục
	 * @param  boolean $list   default: false
	 * @param  array   $params Mảng điều kiện cần lấy
	 * @return array
	 */
	public function getListCategories($list = true, array $params = array()) {

		$slug = array_get($params, 'name');

		$type = (int) array_get($params, 'type');

		$data = $this->model->orderBy('created_at', 'DESC');

		if ($slug) {
			$data->where('slug', removeTitle($slug));
		}

		if ($type) {
			$data->where('type', $type);
		}

		$data = $data->get();

		$this->sortAll($data, 0, $list);

		return $this->maskDataAll;
	}

	/**
	 * Lấy ra tất cả các danh mục có trạng thái được Active
	 * @param  boolean $list   default: false
	 * @param  array   $conditions[] Mảng điều kiện
	 * @return array
	 */
	public function getAllCategories($list = true, $conditions = array())
	{
		$data = $this->model->where('active', Category::ACTIVE);

		if (!empty($conditions)) {
			foreach ($conditions as $key => $val) {
				$data = $data->where($key, $val);
			}
		}

		$data = $data->orderBy('created_at', 'DESC')->get();

		$this->sort($data, 0, $list);

		return $this->maskData;
	}

	public function getHeaderCategories($list = true, $conditions = array())
	{
		$data = $this->model->where('active', Category::ACTIVE);

		if (!empty($conditions)) {
			foreach ($conditions as $key => $val) {
				$data = $data->where($key, $val);
			}
		}

		$data = $data->orderBy('created_at', 'DESC')->get();

		$this->sortHeader($data, 0, $list);

		return $this->maskDataHeader;
	}


	/**
	 * Hàm đệ quy để lấy ra danh mục
	 * @param  [type]  $data   [description]
	 * @param  integer $parent [description]
	 * @param  boolean $list   [description]
	 * @return [type]          [description]
	 */
	public function sort($data, $parent = 0, $list = true)
	{
		if (!empty($data)) {
			foreach ($data as $key => $category) {
				if ($category->parent_id == $parent) {
					$category->mask = ($category->level <= 1) ? $category->name : '|' . str_repeat($this->html, $category->level - 1) . $category->name;
					if ($list) {
						$this->maskData[$category->id] = $category->mask;
					} else {
						array_push($this->maskData, $category);
					}
					$this->sort($data, $category->id, $list);
				}
			}
		}
	}

/**
	 * Hàm đệ quy để lấy ra danh mục kể cả chưa active
	 * @param  [type]  $data   [description]
	 * @param  integer $parent [description]
	 * @param  boolean $list   [description]
	 * @return [type]          [description]
	 */
	public function sortAll($data, $parent = 0, $list = true)
	{
		if (!empty($data)) {
			foreach ($data as $key => $category) {
				if ($category->parent_id == $parent) {
					$category->mask = ($category->level <= 1) ? $category->name : '|' . str_repeat($this->html, $category->level - 1) . $category->name;
					if ($list) {
						$this->maskDataAll[$category->id] = $category->mask;
					} else {
						array_push($this->maskDataAll, $category);
					}
					$this->sortAll($data, $category->id, $list);
				}
			}
		}
	}

	public function sortHeader($data, $parent = 0, $list = true, $ul = false, $level = 1) {
		if (!empty($data)) {
			if($ul) {
				if($level > 2) {
					$this->maskDataHeader .= '<ul class="dropdown-menu dropdown-menu-x">';
				} else if($level > 1) {
					$this->maskDataHeader .= '<ul class="dropdown-menu">';
				}
			}
			foreach ($data as $key => $category) {
				if ($category->parent_id == $parent) {
					// if($category->level <= 1) {
					// 	$this->maskDataHeader = '<li class="dropdown ';
					// 	if($category->checkUrl(explode("-", Request::segment(2))[0], $category->id)) {
					// 		$this->maskDataHeader .= 'active ';
					// 	}
					// 	$this->maskDataHeader .= '" ><a href="'.$category->getUrlCat().'" class="dropdown-hover">'.$category->name;
					// 	if($category->getCountByParent() > 0) {
					// 		$this->maskDataHeader .= '<span class="caret"> </span> ';
					// 	}
					// 	$this->maskDataHeader .= '</a>';
					// }
					// else {
						$this->maskDataHeader .= '<li class="';
						if($category->getCountByParent() > 0) {
							$this->maskDataHeader .= 'dropdown ';
						}
						if($category->checkUrl(explode("-", Request::segment(2))[0], $category->id)) {
							$this->maskDataHeader .= 'active ';
						}
						$this->maskDataHeader .= '"><a href="'.$category->getUrlCat().'" class="dropdown-hover">'.$category->name;
						if($category->level <= 1 && $category->getCountByParent() > 0) {
							$this->maskDataHeader .= '<span class="caret"> </span> ';
						}else if($category->level > 1 && $category->getCountByParent() > 0) {
							$this->maskDataHeader .= '<span class="caret-x"> </span> ';
						}
						$this->maskDataHeader .= '</a>';
					// }

					if($category->getCountByParent() > 0) {
						$this->sortHeader($data, $category->id, $list, true, $level+1);
					} else {
						$this->sortHeader($data, $category->id, $list, false, $level+1);
					}

					$this->maskDataHeader .= '</li>';
				}
			}
			if($ul) {
				if($level > 1) {
					$this->maskDataHeader .= '</ul>';
				}
			}
		}
	}

	/**
	 * Thực thi xóa dữ danh mục đồng thời cập nhập lại level và path cho danh mục
	 * @param  Category $category [ Đối tượng cần xóa]
	 *
	 */
	public function removeCategory(Category $category)
	{
		$this->model->where('path', 'LIKE', $category->path . '%')
		->update([
			'parent_id' => 0,
			'level'     => $this->db->raw('`level` - 2 '),
			'path'      => $this->db->raw('REPLACE(`path`, \'' . $category->path . '\', \'\')')
		]);

		return $this->model->where('id', $category->id)->delete();
	}

	/**
	 * Lấy ra danh mục theo slug
	 * @param  [type] $slug [description]
	 * @return [type]       [description]
	 */
	public function getCategoryBySlug($slug) {
		return $this->model->where('slug', $slug)->where('active', Category::ACTIVE)->first();
	}

	public function getListCategoryByParent()
	{

	}

	public function getListCategoryByChildren()
	{

	}

	public function getTemplateDropdown() {

	}

	/**
	 * Toggle active status
	 *
	 * @param  Categories $categories
	 *
	 * @return Categories
	 */

	public function toggleActiveStatus(Category $category) {
		$category->active = !$category->active;
		return $category->save();
	}

}
