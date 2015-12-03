<?php

namespace Nht\Hocs\Blogs;

use Xss, Hash, Config;

/**
*
*/
class BlogCreator
{

	function __construct(BlogRepository $blog)
	{
		$this->blog = $blog;
		$this->image = \App::make('ImageFactory');
	}

	public function createBlog(BlogCreatorListener $listener, array $data) {
		$blog = $this->blog->getInstance();
		$blog->title = Xss::clean(array_get($data, 'title'));
		$blog->teaser = Xss::clean(array_get($data, 'teaser'));
		$blog->content = Xss::clean(array_get($data, 'content'));
		$blog->active = Blog::NOACTIVE;
		$blog->hot = Blog::NOHOT;
		$blog->category_id = Xss::clean(array_get($data, 'category_id'));
		$blog->user_id = \Auth::user()->id;
		$blog->slug = removeTitle(array_get($data, 'title'));
		$blog->tags = Xss::clean(array_get($data, 'tags'));

		//Upload image
		if(\Input::file('image')) {
			$configImage = Config::get('image');
			$arrayResize = $configImage['array_resize_image'];
			$resultUpload = $this->image->upload('image', PATH_UPLOAD_BLOG_THUMBNAIL, $arrayResize, 'resize');
			if($resultUpload['status'] > 0) {
				$blog->image = $resultUpload['filename'];
			}
		}

		if($blog->save()) {
			$this->blog->saveTag($blog, Xss::clean(array_get($data, 'tags')));
			return $listener->creationSuccess($blog);
		}

		return $listener->creationFailed();

	}
}