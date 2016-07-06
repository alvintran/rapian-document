<?php

namespace Nht\Hocs\Blogs;

interface BlogUpdaterListener {
	public function updateSuccess(Blog $blog);
	public function updateFailed();
}