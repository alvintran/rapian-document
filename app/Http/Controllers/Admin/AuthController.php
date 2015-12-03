<?php

namespace Nht\Http\Controllers\Admin;

use Nht\Http\Controllers\Admin\AdminController;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

/**
 * Class description.
 *
 * @author	AlvinTran
 */
class AuthController extends AdminController
{
	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	protected $loginPath = '/admin/login';
	protected $redirectPath = '/admin/dashboard';
	protected $redirectAfterLogout = '/admin/login';

	/**
    * Override getLogin method in Illuminate/Auth/AuthenticatesUsers trait
    * @return View
    */
	public function getLogin()
	{
		return view('admin.login');
	}

	/**
	 * View dashboard
	 * @return View
	 */
	public function dashboard()
	{
		return view('admin/dashboard');
	}
}
