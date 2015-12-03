<?php

namespace Nht\Hocs\Users;

use Nht\Hocs\Core\BaseRepository;
use Nht\Hocs\Users\User;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class DbUserRepository.
 *
 * @author	AlvinTran
 */
class DbUserRepository extends BaseRepository implements UserRepository
{

	protected $model;
	protected $auth;

	public function __construct(User $model, Guard $auth)
	{
		$this->model = $model;
		$this->auth = $auth;
	}

	public function getByEmail($email)
	{
		return $this->model->where('email', $email)->first();
	}

	public function getActivedUser($pageSize = 20)
	{
		$this->model->where('active', 1)->paginate($pageSize);
	}

	public function getCurrentUser()
	{
		return $this->auth->user();
	}

	public function isLogged()
	{
		return $this->auth->check();
	}

	public function isActived() {
		return $this->getCurrentUser()->active;
	}

	public function isAdmin()
	{
		return $this->getCurrentUser()->hasRole(['superadmin', 'admin']);
	}

	/**
	 * Tìm hoặc tạo mới tài khoản user dựa vào ID của họ trên social network
	 * @param  obj $user
	 * @param  string $provider
	 * @return Eloquent model
	 */
	public function loginWithSocialite($user, $provider)
	{
		// Login with socialite_id first
		if ($authUser = $this->getBySocialiteId($user, $provider))
		{
			return $authUser;
		}

		// If not exist socialite_id then email
		if ($signedUser = $this->getByEmail($user->getEmail()))
		{
			$signedUser->fill([
				$provider.'_id' => $user->getId()
			])->save();
			return $signedUser;
		}

		// If not exist at all then create new user
		return $this->create([
			'email' => $user->getEmail(),
			'name' => $user->getName(),
			'nickname' => is_null($user->getNickName()) ? $user->getName() : $user->getNickName(),
			'avatar' => $user->getAvatar(),
			'password' => bcrypt(str_random(10)),
			$provider.'_id' => $user->getId()
		]);
	}

	/**
	 * Hàm tìm kiếm User dựa trên socialite_id
	 * @param  obj $user
	 * @param  string $provider
	 * @return Eloquent model
	 */
	public function getBySocialiteId($user, $provider)
	{
		return $this->model->where($provider.'_id', $user->id)->first();
	}

}
