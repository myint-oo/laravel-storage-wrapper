<?php

namespace MyintOo\LaravelStorageWrapper\Providers;

use Illuminate\Support\ServiceProvider;
use MyintOo\LaravelStorageWrapper\Interfaces\StorageDriverInterface;

class LaravelStorageWrapperServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/laravel-storage-wrapper.php' => config_path('laravel-storage-wrapper.php'),
        ], 'laravel-storage-wrapper');

        $this->app->bind(StorageDriverInterface::class, config('laravel-storage-wrapper.service-class'));
    }
}