<?php
/**
 * Make Delete Button
 *
 * @param  url $link
 * @return html
 */
function makeDeleteButton($link) {
	return '<a class="btn btn-xs btn-danger btn-delete-action" href="'. $link .'"><i class="fa fa-trash-o"></i></a>';
}


/**
 * Make Edit button
 *
 * @param  url $link
 * @return html
 */
function makeEditButton($link) {
	return '<a class="btn btn-xs btn-default" href="'. $link .'"><i class="fa fa-pencil"></i></a>';
}


/**
 * Make active button
 *
 * @param  url $link
 * @param  integer $currentActiveValue
 * @return html
 */
function makeActiveButton($link, $currentActiveValue) {
	$classActive = $currentActiveValue == 1 ? 'fa-check-square' : 'fa-square-o';
	return '<a class="btn-action btn-xs btn-active-action" href="'. $link .'"><i class="fa '. $classActive .' fa-2x"></i></a>';
}


/**
 * Convert ngày tháng sang unixtimestamp
 *
 * @param  string $dateStr  Chuỗi định dạng ngày tháng
 * @param  string $hour     Chuỗi định dạng giờ::phút::giây nối vào để lấy time chính xác
 *
 * @return unixtimestamp
 */
function convertDateToTime($dateStr, $hour = '00:00:00') {
	$dateStr = str_replace('/', '-', $dateStr);
	return strtotime($dateStr . ' ' . trim($hour));
}


/**
 * Tao chu khong dau & thay the dau cach bang dau -
 * @param  [type] $string     [description]
 * @param  string $keyReplace [description]
 * @return [type]             [description]
 */
function removeTitle($string, $keyReplace = "/"){
	$string = removeAccent($string);
	$string =  trim(preg_replace("/[^A-Za-z0-9]/i"," ",$string)); // khong dau
	$string =  str_replace(" ","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace($keyReplace,"-",$string);
	return strtolower($string);
}

/**
 * Remove tieng viet thanh khong dau
 * @param  [type] $string [description]
 * @return [type]         [description]
 */
function removeAccent($string) {
	$marTViet = array(
	// Chữ thường
	"à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
	"è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
	"ì","í","ị","ỉ","ĩ",
	"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
	"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
	"ỳ","ý","ỵ","ỷ","ỹ",
	"đ","Đ","'",
	// Chữ hoa
	"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
	"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
	"Ì","Í","Ị","Ỉ","Ĩ",
	"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
	"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
	"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
	"Đ","Đ","'",
	);
	$marKoDau=array(
		/// Chữ thường
		"a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a",
		"e","e","e","e","e","e","e","e","e","e","e",
		"i","i","i","i","i",
		"o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o",
		"u","u","u","u","u","u","u","u","u","u","u",
		"y","y","y","y","y",
		"d","D","",
		//Chữ hoa
		"A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A",
		"E","E","E","E","E","E","E","E","E","E","E",
		"I","I","I","I","I",
		"O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
		"U","U","U","U","U","U","U","U","U","U","U",
		"Y","Y","Y","Y","Y",
		"D","D","",
		);
	return str_replace($marTViet, $marKoDau, $string);
}



/**
 * Tạo link sort
 *
 * @param  url $url
 * @param  array  $sortArray
 * @example http://example.com => http://example.com?name=desc&age=asc
 *
 * @return url
 */
function createLinkSort($field, $url = null) {

	if(!isUrl($url)) {
		throw new Nht\Exceptions\UrlIsNotValidException("Url is not valid", 1);
	}

	$get      = $_GET;
	$parseUrl = parse_url($url);

	if(strpos($url, '?') !== false) {
		parse_str($parseUrl['query'], $urlParams);
	}

	if(isset($get[$field])) {
		if($get[$field] == 'asc') {
			$get[$field] = 'desc';
		} else {
			$get[$field] = 'asc';
		}
	} else {
		$get[$field] = 'desc';
	}

	$urlReturn = $parseUrl['scheme'] . '://' . $parseUrl['host'];
	$urlReturn .= '?' . http_build_query($get);

	return $urlReturn;
}

/**
 * Check URL
 *
 * @param  string  $url
 * @return boolean
 */
function isUrl($url) {
	return filter_var($url, FILTER_VALIDATE_URL);
}

if ( ! function_exists('str_remove_accent')) {
	/**
	 * @param $str
	 * @param string $separator
	 * @return mixed
	 */
	function str_remove_accent($str, $separator = ' ')
	{
		$str = trim($str);
		$str = stripslashes($str);
		$str = str_replace(array("&quot;", ":", ".", "'", ",", ";", ")", "(", "?", "@", "%", "*", "&", "^", "!", "=", "{", "}", "\\", '"', '-', '‘', '’', '•', "&nbsp;"), " ", $str);
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = str_replace(array(' ', '--', '|', "/", '_', "[", "]", "+"), $separator, $str);
		$str = strtolower($str);
		return $str;
	}
}

if ( ! function_exists('str_slug_uft8')) {
	/**
	 * @param $title
	 * @param string $separator
	 * @return string
	 */
	function str_slug_uft8($title, $separator = '-')
	{
		$title = str_remove_accent($title);
		$flip = $separator == '-' ? '_' : '-';
		$title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);
		$title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', mb_strtolower($title));
		$title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

		return trim($title, $separator);
	}

	function createLinkSort2($fieldSort , $typeSort = 'asc') {

    $queryString = array(
        'action'     => 'sort',
        'field_sort' => $fieldSort,
        'type_sort'  => $typeSort
    );

    $queryUrl = $_SERVER['QUERY_STRING'];

    $_get = array();

    foreach($_GET as $key => $value) {
        $_get[$key] = $value;
    }

    $_get['field_sort'] = $fieldSort;

    if(isset($_GET['type_sort']) && $_GET['type_sort'] == 'asc') {
        $_get['type_sort'] = 'desc';
    }else if(isset($_GET['type_sort']) && $_GET['type_sort'] == 'desc') {
        $_get['type_sort'] = 'asc';
    }else{
        $_get['type_sort'] = $typeSort;
    }

    $query = http_build_query($_get);

    if(strpos($queryUrl, '?')) {
        return '&' . $query;
    }

    return '?' . $query;
}
}