<?php

namespace Nht\Hocs\Categories;

interface CategoryUpdaterListener {
	public function updationSuccess();
	public function updationFailed();
	public function toggleActiveStatusSuccess(Category $category);
	public function toggleActiveStatusFailed();
}