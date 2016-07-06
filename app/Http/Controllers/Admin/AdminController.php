<?php

namespace Nht\Http\Controllers\Admin;

use Illuminate\Contracts\Auth\Guard as Auth;
use Nht\Hocs\Users\UserRepository;
use Nht\Http\Controllers\Controller;

class AdminController extends Controller {

	/**
	 * Keep track logged user
	 */
	protected $auth;

	/**
	 * Current user
	 */
	protected $logger;

	public function __construct()
	{
		$this->auth = \App::make(Auth::class);
		$this->logger = \App::make(UserRepository::class);
	}
}