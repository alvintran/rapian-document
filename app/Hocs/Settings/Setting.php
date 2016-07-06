<?php

namespace Nht\Hocs\Settings;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	public $timestamps = false;

	public function getLogo($type = 'md_')
	{
		return $this->logo != null ? LOGO_SETTING . $type . $this->logo : '/images/no-image.png';
	}

}
