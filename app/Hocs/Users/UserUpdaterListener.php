<?php namespace Nht\Hocs\Users;

interface UserUpdaterListener {
	public function updationSuccess(User $user, $profile = false);
	public function updationFailed();
}