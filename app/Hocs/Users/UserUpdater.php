<?php namespace Nht\Hocs\Users;

use Xss, Hash, Config;

class UserUpdater {

	public function __construct(UserRepository $user)
	{
		$this->user = $user;
		$this->image = \App::make('ImageFactory');
	}

	public function updateUser(UserCreatorListener $listener, User $user, array $data, $profile = false)
	{
		if(array_get($data, 'email') != '') {
			$user->email    = Xss::clean(array_get($data, 'email'));
		}
		$user->nickname = Xss::clean(array_get($data, 'nickname'));
		$user->name     = Xss::clean(array_get($data, 'name'));
		$user->phone    = Xss::clean(array_get($data, 'phone'));
		$user->address  = Xss::clean(array_get($data, 'address'));

		if(array_get($data, 'password') != '') {
			$password = array_get($data, 'password');
				if($password != $user->password) {
					$user->password = Hash::make(Xss::clean($password));
				}
		}

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
			if((array) array_get($data, 'roles')) {
				$roles = (array) array_get($data, 'roles');
         	$user->roles()->sync($roles);
			}
			if($profile == false) {
				return $listener->updationSuccess($user, false);
			}
         return $listener->updationSuccess($user, true);
		}

		return $listener->updationFailed();
	}

	// public function frontendUpdateUser(UserCreatorListener $listener, User $user, array $data)
	// {
	// 	$user->nickname = Xss::clean(array_get($data, 'nickname'));
	// 	$user->name     = Xss::clean(array_get($data, 'name'));
	// 	$user->phone    = Xss::clean(array_get($data, 'phone'));
	// 	$user->address  = Xss::clean(array_get($data, 'address'));

	// 	// Upload avatar
	// 	if(\Input::file('avatar')) {
	// 		$configImage = Config::get('image');
	// 		$arrayCrop = $configImage['array_crop_image'];
	// 		$resultUpload = $this->image->upload('avatar', PATH_UPLOAD_USER_AVATAR, $arrayCrop, 'crop');
	// 		if($resultUpload['status'] > 0) {
	// 			$user->avatar = $resultUpload['filename'];
	// 		}
	// 	}

	// 	if($user->save()) {
 //         return $listener->updationSuccess($user);
	// 	}

	// 	return $listener->updationFailed();
	// }
}