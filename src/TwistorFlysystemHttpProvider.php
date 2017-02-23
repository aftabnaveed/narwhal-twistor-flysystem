<?php

namespace Narwhal\Twistor\Flysystem;

use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Twistor\Flysystem\Http\HttpAdapter;

use Illuminate\Support\ServiceProvider;

class TwistorFlysystemHttpProvider extends ServiceProvider
{
    /**
     * Register driver
     *
     */
    public function register()
    {
        $this->app->singleton('filesystems.disks.http', function(){
            $httpDriver =  $this->app['config']['filesystems.disks.http'];
            return $this->app['filesystem.disks']->disk($httpDriver);
        });
    }

    /**
     * Initialize the adapter
     *
     */
    public function boot()
    {
        Storage::extend('http', function($app, $config){
            return new Filesystem(
                new HttpAdapter($config['baseurl'], $config['supportsHead'], $config['context'])
            );
        });

    }

}