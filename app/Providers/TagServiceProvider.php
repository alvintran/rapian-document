<?php

namespace Nht\Providers;

use Illuminate\Support\ServiceProvider;

class TagServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // $tagRepo = $this->app->make('Nht\Hocs\Tags\TagRepository');
        // $tags = $tagRepo->getTopTagByRelaysionship(15);
        // view()->share('topTags', $tags);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Nht\Hocs\Tags\TagRepository', 'Nht\Hocs\Tags\DbTagRepository');
    }
}
