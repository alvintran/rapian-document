<?php

namespace Nht\Hocs\Entrusts;

/**
 * Interface description.
 *
 * @author	AlvinTran
 */
interface RoleRepository
{
	public function getByName($role);
}