<?php

namespace Nht\Hocs\Categories;

interface CategoryRepository
{
	public function getListTypeByCategory();
	public function getListCategories($list = true, array $params = array());
	public function getAllCategories($list = true, $conditions = array());
	public function getCategoryBySlug($slug);
}
