<?php

namespace Nht\Providers;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // $blogRepo = $this->app->make('Nht\Hocs\Blogs\BlogRepository');
        // $hotBlogs = $blogRepo->getHot(5, 5);
        // view()->share('hotBlogs', $hotBlogs);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Nht\Hocs\Blogs\BlogRepository', 'Nht\Hocs\Blogs\DbBlogRepository');
    }
}
