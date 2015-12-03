<?php

namespace Nht\Hocs\Users;

/**
 * Interface description.
 *
 * @author	AlvinTran
 */
interface UserRepository
{
	public function getByEmail($email);
	public function getActivedUser($pageSize);
	public function getCurrentUser();
	public function isLogged();
	public function isAdmin();
	public function isActived();
}