<?php

namespace Nht\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
   /**
    * Register the application services.
    *
    * @return void
    */
   public function register()
   {
      $this->app->singleton('Nht\Hocs\Users\UserRepository', 'Nht\Hocs\Users\DbUserRepository');
   }
}
