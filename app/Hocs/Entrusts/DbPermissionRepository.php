<?php

namespace Nht\Hocs\Entrusts;

use Nht\Hocs\Core\BaseRepository;
use Nht\Hocs\Entrusts\Permission;

/**
 * Class description.
 *
 * @author	AlvinTran
 */
class DbPermissionRepository extends BaseRepository implements PermissionRepository
{
	protected $model;

	public function __construct(Permission $model)
	{
		$this->model = $model;
	}

}