<?php

namespace Nht\Hocs\Tags;

use Nht\Hocs\Core\BaseRepository;
use DB;

/**
 * Class DbUserRepository.
 *
 * @author	AlvinTran
 */
class DbTagRepository extends BaseRepository implements TagRepository
{
	protected $model;

	public function __construct(Tag $model) {
		$this->model = $model;
	}

	public function getTagByName($tagName) {
		return $this->model->where('tag', $tagName)->first();
	}

	public function getTagBySlug($slug) {
		return $this->model->where('slug', $slug)->first();
	}

	public function searchTag($tag) {
		return $this->model->select('tag', 'slug')->where('slug', 'like', '%'.$tag.'%')->take(10)->get();
	}

	public function getTopTagByRelaysionship($num = 10, $pageSize = 100) {
		return $this->model->join('blog_tags', 'tags.id', '=', 'blog_tags.tag_id')
								 ->join('blogs', 'blog_tags.blog_id', '=', 'blogs.id')
								 ->select(DB::raw('count("blog_tags.tag_id") AS tagCount, tags.tag, tags.slug'))
								 ->where('blogs.active', 1)
								 ->groupBy('tag_id')
								 ->orderBy('tagCount', 'DESC')
								 ->take($num)
								 ->get();
	}


}