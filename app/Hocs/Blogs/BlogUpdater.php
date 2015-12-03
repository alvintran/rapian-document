<?php

namespace Nht\Hocs\Blogs;

use Xss, Hash, Config;

/**
*
*/
class BlogUpdater
{

	function __construct(BlogRepository $blog)
	{
		$this->blog = $blog;
		$this->image = \App::make('ImageFactory');
	}

	public function updateBlog(BlogCreatorListener $listener, Blog $blog ,array $data) {
		$thisBlog = $blog;
		$blog->title = Xss::clean(array_get($data, 'title'));
		$blog->teaser = Xss::clean(array_get($data, 'teaser'));
		$blog->content = Xss::clean(array_get($data, 'content'));
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
			// unlink(PATH_UPLOAD_BLOG_THUMBNAIL.$thisBlog->image);
			// unlink(PATH_UPLOAD_BLOG_THUMBNAIL.'lg_'.$thisBlog->image);
			// unlink(PATH_UPLOAD_BLOG_THUMBNAIL.'md_'.$thisBlog->image);
			// unlink(PATH_UPLOAD_BLOG_THUMBNAIL.'sm_'.$thisBlog->image);
			// unlink(PATH_UPLOAD_BLOG_THUMBNAIL.'xlg_'.$thisBlog->image);
			return $listener->updateSuccess($blog);
		}

		return $listener->updateFailed();

	}
}