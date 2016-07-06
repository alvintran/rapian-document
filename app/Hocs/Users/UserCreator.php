<?php

namespace Nht\Hocs\Users;

use Xss, Hash, Config;

class UserCreator {

	public function __construct(UserRepository $user)
	{
		$this->user = $user;
		$this->image = \App::make('ImageFactory');
	}

	public function createUser(UserCreatorListener $listener, array $data)
	{
		$user           = $this->user->getInstance();
		$user->email    = Xss::clean(array_get($data, 'email'));
		$user->nickname = Xss::clean(array_get($data, 'nickname'));
		$user->name     = Xss::clean(array_get($data, 'name'));
		$user->phone    = Xss::clean(array_get($data, 'phone'));
		$user->address  = Xss::clean(array_get($data, 'address'));
		$user->password = Hash::make(Xss::clean(array_get($data, 'password')));

		// Upload avatar
		if(\Input::file('avatar')) {
			$configImage = Config::get('image');
			$arrayCrop = $configImage['array_crop_image'];
			$resultUpload = $this->image->upload('avatar', PATH_UPLOAD_USER_AVATAR, $arrayCrop, 'crop');
			if($resultUpload['status'] > 0) {
				$user->avatar = $resultUpload['filename'];
			}
		}

		if($user->save()) {
			$roles = (array) array_get($data, 'roles');
         $user->roles()->sync($roles);
         return $listener->creationSuccess($user);
		}

		return $listener->creationFailed();
	}
}