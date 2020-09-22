<?php

namespace Lucaborghy\Blogkit;

use Illuminate\Support\ServiceProvider;

class BlogkitServiceProvider extends ServiceProvider
{

     /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostController::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      $this->loadRoutesFrom(__DIR__.'/routes.php');
      $this->loadMigrationsFrom(__DIR__.'/migrations');
      $this->loadViewsFrom(__DIR__.'/views', 'blogkit');
      $this->publishes([
          __DIR__.'/views' => base_path('resources/views/lucaborghy/blogkit'),
      ]);
    }
}
