<?php

namespace Nht\Hocs\Entrusts;

use Nht\Hocs\Core\BaseRepository;
use Nht\Hocs\Entrusts\Role;

class DbRoleRepository extends BaseRepository implements RoleRepository {

	protected $model;

	public function __construct(Role $model)
	{
		$this->model = $model;
	}

	public function getByName($role)
	{
		return $this->model->where('name', $role)->first();
	}
}