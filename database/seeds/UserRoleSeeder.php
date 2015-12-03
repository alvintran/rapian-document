<?php

use Illuminate\Database\Seeder;
use Nht\Hocs\Users\UserRepository;
use Nht\Hocs\Entrusts\RoleRepository;

class UserRoleSeeder extends Seeder
{

	protected $user;
	protected $role;

	public function __construct(UserRepository $userModel, RoleRepository $roleModel)
	{
		$this->user = $userModel;
		$this->role = $roleModel;
	}
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = $this->user->getById(1);
    	$role = $this->role->getByName('superadmin');
    	$user->roles()->attach($role);
    }
}
