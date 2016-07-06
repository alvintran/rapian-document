<?php

// Base path
define('BASE_PATH', realpath(rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/..') . '/');

// Path assets
define('PATH_ASSETS', '/assets/');

// Path upload logo settings
define('LOGO_SETTING_PATH_UPLOAD', rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/uploads/settings/');
define('LOGO_SETTING', '/uploads/settings/');

// Path upload user avatar
define('PATH_UPLOAD_USER_AVATAR', rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/uploads/users/');
define('PATH_USER_AVATAR', '/uploads/users/');

define('PATH_UPLOAD_BLOG_THUMBNAIL', rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/uploads/blogs/');
define('PATH_BLOG_THUMBNAIL', '/uploads/blogs/');