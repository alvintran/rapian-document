<?php

namespace Nht\Providers;

use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	*/
	public function boot()
	{

   }

	 /**
	  * Register the application services.
	  *
	  * @return void
	  */
	 public function register()
	 {
		$this->app->singleton('Nht\Hocs\Settings\SettingRepository', 'Nht\Hocs\Settings\DbSettingRepository');
	 }
}
