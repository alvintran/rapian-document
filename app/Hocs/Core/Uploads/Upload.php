<?php namespace Nht\Hocs\Core\Uploads;

class Upload {

	public function __construct($config = []) {
		if (empty($config))
		{
			$config = (array) config('upload');
		}
		$this->extensions = array_get($config, 'extensions');
		$this->fileSize   = array_get($config, 'file_size');
	}

	/**
	 * Upload file
	 *
	 * @param  string $fileControl
	 * @param  path $pathUpload
	 *
	 * @return string|null
	 */
	public function upload($fileControl, $pathUpload) {
		//Duong dan luu anh
		$pathUpload = rtrim($pathUpload, '/') . '/';

		if(!isset($_FILES[$fileControl])) {
			throw new Exceptions\NoFileSelectedException("Chưa chọn file upload");
		}

		//Upload code
		$uploadErrorCode = $_FILES[$fileControl]['error'];

		if($uploadErrorCode > 0) {
			throw new Exceptions\UploadException($uploadErrorCode);
		}

		if($this->checkExtension($_FILES[$fileControl]['tmp_name']) == false) {
			throw new Exceptions\FileTypeIsNotAllowedException($this->getExtensions());
		}

		if($this->checkFilesizeLimit($_FILES[$fileControl]['tmp_name']) == false) {
			throw new Exceptions\UploadMaxFileSizeException($this->getFileSizeLimit());
		}

		if(!file_exists($pathUpload)) {
			throw new Exceptions\UploadPathDoesNotExistException("Đưòng dẫn upload không tồn tại. Bạn đã tạo folder lưu trữ file này chưa?");
		}

		$newFileName = $this->generateNewFileName($_FILES[$fileControl]['tmp_name']);

		if(move_uploaded_file($_FILES[$fileControl]['tmp_name'], $pathUpload . $newFileName)) {
			return $newFileName;
		}
	}


	/**
	 * Get extension
	 * @param  string $filename
	 * @return mixed
	 */
	public function getExtension($filename) {
		$file_info	= @getimagesize($filename);
		$mime			= $file_info['mime'];
		$array_mime	= explode('/', $mime);
		$extension	= isset($array_mime[1]) ? strtolower($array_mime[1]) : null;

		if($extension)	return $extension;
	}


	/**
	 * Generate new file name
	 *
	 * @param  string $filename
	 *
	 * @return string
	 */
	public function generateNewFileName($filename) {
		$strSecret   = '!@#$%^&*()_+QBGFTNKU' . time() . rand(111111,999999);
		$filenameMd5 = substr(md5($filename . $strSecret),0,10);
		return date('Y_m_d') . '_' . $filenameMd5 . '.' . $this->getExtension($filename);
	}


	/**
	 * Get config extensions
	 *
	 * @return array
	 */
	public function getExtensions() {
		return $this->extensions;
	}

	/**
	 * Get config limit file size
	 *
	 * @return integer
	 */
	public function getFileSizeLimit() {
		return $this->fileSize;
	}


	/**
	 * Kiem tra extension
	 * @param  [type] $filename [description]
	 * @return [true | false]           [description]
	 */
	protected function checkExtension($filename) {
		$extension = $this->getExtension($filename);

		if(!in_array($extension, $this->extensions)){
			return false;
		}

		return true;
	}


	/**
	 * Kiem tra dung luong upload cho phep
	 * @param  [type] $filename [description]
	 * @return [true | false]           [description]
	 */
	protected function checkFilesizeLimit($filename) {
		if(filesize($filename) / 1024 > $this->fileSize){
			return false;
		}

		return true;
	}
}