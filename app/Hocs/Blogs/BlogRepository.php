<?php

namespace Nht\Hocs\Blogs;

/**
 * Interface description.
 *
 * @author	lcn
 */
interface BlogRepository
{
	public function getRandomName($filename);
	public function saveTag(Blog $blog, $arrTags);
	public function getAllWithPaginateAndSorting($pageSize = 20);
	public function getHot($pageSize = 20);
	public function getAllByTagWithPaginate($tagId, $pageSize = 20);
	public function getLQ($category_id);
}