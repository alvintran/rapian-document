<?php namespace Nht\Hocs\Users;

interface UserCreatorListener {
	public function creationSuccess(User $user);
	public function creationFailed();
}