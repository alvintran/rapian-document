<?php

namespace Nht\Hocs\Blogs;

interface BlogCreatorListener {
	public function creationSuccess(Blog $blog);
	public function creationFailed();
}