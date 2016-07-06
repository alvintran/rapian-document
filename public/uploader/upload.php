<?php

if(isset($_FILES['upload'])){
	if($_FILES['upload']['name'] == NULL){ // Đã chọn file
	   echo "Vui lòng chọn file";die;
	}
	if($_FILES['upload']['type'] != "image/jpeg"
	   && $_FILES['upload']['type'] != "image/jpg"
	   && $_FILES['upload']['type'] != "image/png"
	   && $_FILES['upload']['type'] != "image/gif")
	{
		echo "Kiểu file không hợp lệ";die;
	}
	if($_FILES['upload']['size'] > 2097152){
     echo "File không được lớn hơn 2mb";
   }
   $path = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/uploads/blogs/';
   $tmp_name = $_FILES['upload']['tmp_name'];
   $name = $_FILES['upload']['name'];
   $newName = time('ymdHis') . '_' . explode('.', $name)[0] . '.' . explode('.', $name)[1];
	move_uploaded_file($tmp_name, $path . $newName);
	$url = 'http://' . rtrim($_SERVER['SERVER_NAME'], '/') . '/uploads/blogs/' . $newName;

   $funcNum = $_GET['CKEditorFuncNum'] ;
   // Optional: instance name (might be used to load a specific configuration file or anything else).
   $CKEditor = $_GET['CKEditor'] ;
   // Optional: might be used to provide localized messages.
   $langCode = $_GET['langCode'] ;

   // Usually you will only assign something here if the file could not be uploaded.
   $message = '';
   echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
}