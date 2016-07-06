<?php

namespace Nht\Hocs\Settings;

use Nht\Hocs\Core\BaseRepository;
use Nht\Hocs\Settings\Setting;

class DbSettingRepository extends BaseRepository implements SettingRepository
{
	protected $model;

	public function __construct(Setting $model) {
		$this->model = $model;
	}

}
