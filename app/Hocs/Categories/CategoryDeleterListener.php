<?php

namespace Nht\Hocs\Categories;

interface CategoryDeleterListener {
	public function deletionSuccess();
	public function deletionFailed();
}