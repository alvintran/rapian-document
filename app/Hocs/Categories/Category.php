<?php

namespace Nht\Hocs\Categories;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
	* The database table used by the model.
	*
	* @var string
	*/
	protected $table   = 'categories';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = ['name', 'slug', 'type', 'parent_id', 'icon', 'background', 'description', 'level', 'active'];

	public $primaryKey = 'id';

	/**
	* Định nghĩa constant
	* Trạng thái:	1: ACTIVE - 2: DEACTIVE - 3: DELETE
	* Phân loại: 1: PRODUCT - 2: MENU - 3: NEWS - 4: OTHER
	*/

	// ACTIVE
	const ACTIVE   = 1;
	const DEACTIVE = 2;
	const DELETE   = 3;
	// Type
	const PRODUCT    = 1;
	const PAGESTATIC = 2;
	const NEWS       = 3;
	const OTHER      = 4;

	public function showType()
	{
		switch ($this->getType()) {
			case self::PRODUCT:
				return 'Sản phẩm';

			case self::PAGESTATIC:
				return 'Trang tĩnh';

			case self::NEWS:
				return 'Tin tức';

			default:
				return 'Khác';
		}
	}

	public function showBtnCss()
	{
		switch ($this->getType()) {
			case self::PRODUCT:
				return 'btn-primary';

			case self::PAGESTATIC:
				return 'btn-success';

			case self::NEWS:
				return 'btn-warning';

			default:
				return 'btn-danger';
		}
	}

	public function getId() {
		return $this->id;
	}

	public function getType() {
		return $this->type;
	}

	public function getStatus() {
		return $this->active;
	}

	public function getUrlCat() {
		return route('frontend.blogByCategory', [ $this->id, $this->slug]);
	}

	public function getCountByParent() {
		return $this->where('parent_id', $this->id)->where('active', $this::ACTIVE)->count();
	}

	public function checkUrl($idUrl, $id) {
		if($a = $this->where('id', $idUrl)->where('path', 'LIKE' , '%-'.$id.'-%')->where('active', $this::ACTIVE)->count() > 0) {
			return true;
		}
		return false;
	}
}
