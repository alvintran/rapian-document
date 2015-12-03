<?php

return [
	// Các file được phép upload
	'extensions' => ['gif', 'jpg', 'jpeg', 'png', 'bmp'],

	// 2MB
	'file_size'  => 2048,

	'thumbs' => [
		'sm_' => ['width' => 150, 'height' => 150],
		'md_' => ['width' => 250, 'height' => 250],
		'lg_' => ['width' => 350, 'height' => 350]
	]
];