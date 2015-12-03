<?php namespace Nht\Hocs\Core\Images;

use Nht\Hocs\Core\Uploads\Upload;

class ImageFactory {

	protected $upload;

	protected $image;

	public function __construct(Upload $upload, Image $image) {
		$this->upload = $upload;
		$this->image  = $image;
	}

	public function upload($fileControl, $pathUpload, $arrayThumbs = [], $optional = 'resize') {
		$pathUpload = rtrim($pathUpload, '/') . '/';

		if (empty($arrayThumbs))
		{
			$arrayThumbs = config('upload.thumbs');
		}

		$return = [
			'status'   => 0,
			'size'     => 0,
			'filename' => '',
			'path'     => '',
			'thumbs'   => []
		];

		if($fileName = $this->upload->upload($fileControl, $pathUpload))
		{
			$thumbs = [];

			if($optional == 'resize')
			{
				$thumbs = $this->image->resize($pathUpload . $fileName, $pathUpload, $arrayThumbs);
			}
			else if ($optional == 'crop')
			{
				$thumbs = $this->image->crop($pathUpload . $fileName, $pathUpload, $arrayThumbs);
			}

			$return['status']   = 1;
			$return['thumbs']   = $thumbs;
			$return['filename'] = $fileName;
			$return['path']     = $pathUpload . $fileName;
			$return['size']     = filesize($pathUpload . $fileName);
		}

		return $return;
	}
}