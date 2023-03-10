<?php

use MyintOo\LaravelStorageWrapper\Drivers\DigitalOceanSpaceStorageDriver;

return [

    /*
    |--------------------------------------------------------------------------
    | Name of driver to use for Laravel Storage Facade
    |--------------------------------------------------------------------------
    */
    'driver' => env('LARAVEL_STORAGE_WRAPPER_DRIVER', 'cloud-driver'),


    /*
    |--------------------------------------------------------------------------
    | Service implementation to use for the storage interface
    |--------------------------------------------------------------------------
    */
    'service-class' => env('LARAVEL_STORAGE_WRAPPER_SERVICE_CLASS', DigitalOceanSpaceStorageDriver::class)

];