<?php

namespace Nht\Hocs\Categories;

interface CategoryCreatorListener {
	public function creationSuccess();
	public function creationFailed();
}