<?php

namespace Ktcd\File;

use Illuminate\Support\ServiceProvider;

class FileServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/ktcd_file.php', 'ktcd_file');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'file');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // $this->publishes([
        //     __DIR__.'/config/svknd_feed.php' => config_path('svknd_feed.php'),
        // ], 'svknd-feed-config');

        // $this->publishes([
        //     __DIR__ . '/database/migrations/' => database_path('migrations'),
        // ], 'svknd-feed-migrations');
    }
}
