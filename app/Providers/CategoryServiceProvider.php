<?php

namespace Nht\Providers;

use Illuminate\Support\ServiceProvider;
use Nht\Hocs\Categories\Category;

class CategoryServiceProvider extends ServiceProvider
{

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	*/
	public function boot()
	{
	  // $catRepo = $this->app->make('Nht\Hocs\Categories\CategoryRepository');
	  // $categories = $catRepo->getHeaderCategories(false, ['active' => Category::ACTIVE, 'type' => Category::NEWS]);
	  // view()->share('categories', $categories);
   }

	 /**
	  * Register the application services.
	  *
	  * @return void
	  */
	 public function register()
	 {
		  $this->app->singleton('Nht\Hocs\Categories\CategoryRepository', 'Nht\Hocs\Categories\DbCategoryRepository');
	 }
}
