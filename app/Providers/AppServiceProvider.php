<?php

namespace Nht\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Guard as Auth;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
<<<<<<< HEAD
		if($this->app->environment('local'))
=======
		if ($this->app->environment('local'))
>>>>>>> f7a80eeaab2f4bf874a5e83740af8c60f8779c89
		{
			$this->app->register('Barryvdh\Debugbar\ServiceProvider');
		}
	}
}
