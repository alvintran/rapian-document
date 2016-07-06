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
		if ($this->app->environment('local'))
		{
			$this->app->register('Barryvdh\Debugbar\ServiceProvider');
		}
	}
}
