<?php

namespace Nht\Hocs\Tags;

/**
 * Interface description.
 *
 * @author	lcn
 */
interface TagRepository
{
	public function getTagByName($tagName);
	public function getTagBySlug($slug);
	public function searchTag($tag);
	public function getTopTagByRelaysionship($num = 10, $pagiSize = 100);
}