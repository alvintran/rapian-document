<?php

namespace Nht\Hocs\Blogs;

use Nht\Hocs\Core\BaseRepository;
use Nht\Hocs\Tags\TagRepository;
use Nht\Hocs\Blogs\Blog;
use Nht\Hocs\Tags\Tag;
use DB;
/**
 * Class DbUserRepository.
 *
 * @author	AlvinTran
 */
class DbBlogRepository extends BaseRepository implements BlogRepository
{
	protected $model;
	protected $tag;

	public function __construct(Blog $blog, TagRepository $tag) {
		$this->model = $blog;
		$this->tag = $tag;
	}

	/**
	 * get random name of file
	 * @param  string $filename file name
	 * @return string           random name
	 */
	public function getRandomName($filename) {
    	$strSecret   = '!@#$%^&*()_+QBGFTNKU' . time() . rand(111111,999999);
  		$filenameMd5 = substr(md5($filename . $strSecret),0,10);
  		return date('Y_m_d') . '_' . $filenameMd5 . '.' . $this->getExtension($filename);
   }

   private function getExtension($filename) {
		return explode('.', $filename)[1];
	}

	/**
	 * save tags
	 * @param  Blog   $blog    đối tượng blog
	 * @param  string $arrTags chuỗi tag nhập vào (php,laravel,js)
	 */
	public function saveTag(Blog $blog, $arrTags) {
		$tags = explode(',', $arrTags);
		$tag_id = [];
		foreach ($tags as $key => $tag) {
			$getTag = $this->tag->getTagByName($tag);
			if(!$getTag && $tag) {
				$objTag['tag'] = $tag;
				$objTag['slug'] = removeTitle($tag);
				if($newTag = $this->tag->create($objTag)) {
					$tag_id[] = $newTag->id;
				}
			} else if($getTag && $tag) {
				$tag_id[] = $getTag->id;
			}
		}
		$blog->syncTags()->sync($tag_id);
		return true;
	}

	public function getAllWithPaginateLikeTitle($title = '', $pageSize = 20, $filter = [])
	{
		$return = $this->model->where('title', 'LIKE', '%'.$title.'%');
		if ( ! empty($filter))
		{
			foreach ($filter as $key => $value)
			{
				if ($value == '')
				{
					unset($filter[$key]);
				}
			}
			$return->where($filter);
		}
		return $return->orderBy('created_at', 'DESC')
						  ->paginate($pageSize);
	}

	/**
	 * Get items with paginate and sorting
	 * @param  integer $pageSize
	 * @return Illuminate\Support\Collection model collections
	 */
	public function getAllWithPaginateAndSorting($search = '', $pageSize = 20)
	{
		return $this->model->where('active', Blog::ACTIVE)->where('title', 'LIKE', '%'.$search.'%')
								 ->orderBy('created_at', 'DESC')
								 ->paginate($pageSize);
	}

	public function getHot($pageSize = 20, $num = 5)
	{
		$return = $this->model->where('active', Blog::ACTIVE)
								 ->where('hot', Blog::HOT)
								 ->orderBy('created_at', 'DESC');
		if($num != 0) {
			$return->take($num);
		}
		return $return->paginate($pageSize);
	}

	public function getAllByTagWithPaginate($tagSlug, $pageSize = 20) {
		$tag = $this->tag->getTagBySlug($tagSlug);
		$listBlog = [];
		foreach ($tag->blogs as $blog) {
			$listBlog[] = $blog->id;
		}
		return $this->model->whereIn('id', $listBlog)
								 ->where('blogs.active', Blog::ACTIVE)
								 ->orderBy('blogs.created_at', 'DESC')
								 ->paginate($pageSize);
	}

	public function getAllByCatWithPaginate($catId,  $pageSize = 20) {
		return $this->model->where('category_id', $catId)
		                   ->where('blogs.active', Blog::ACTIVE)
								 ->orderBy('blogs.created_at', 'DESC')
								 ->paginate($pageSize);
	}

	public function getAllByAutWithPaginate($autId,  $pageSize = 20) {
		return $this->model->where('user_id', $autId)
		                   ->where('blogs.active', Blog::ACTIVE)
								 ->orderBy('blogs.created_at', 'DESC')
								 ->paginate($pageSize);
	}

	public function getLQ($category_id) {
		return $this->model->where('active', Blog::ACTIVE)
								 ->where('category_id', $category_id)
								 ->orderBy('created_at', 'DESC')
								 ->take(5)
								 ->get();
	}

}