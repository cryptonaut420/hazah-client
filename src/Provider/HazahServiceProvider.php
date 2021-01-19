<?php

namespace Tokenly\HazahClient\Provider;

use Illuminate\Support\ServiceProvider;
use Tokenly\HazahClient\Console\MakeHazahAuthCommand;
use Tokenly\HazahClient\Contracts\HazahUserRespositoryContract;
use Tokenly\HazahClient\Socialite\HazahSocialiteManager;
use Tokenly\HazahClient\HazahAPI;

/**
 *
 */
class HazahServiceProvider extends ServiceProvider
{

    public function register()
    {
        // bind classes
        $this->app->bind(HazahAPI::class, function ($app) {
            $config = config('hazah');
            return new HazahAPI($config['client_id'], $config['client_secret'], $config['privileged_client_id'], $config['privileged_client_secret'], $config['hazah_url'], $config['redirect_uri'], $config['oauth_client_id'], $config['oauth_client_secret']);
        });


        // extend the Socialite Factory to add our Socialite Manager
        $this->app->extend('Laravel\Socialite\Contracts\Factory', function($service, $app) {
            return new HazahSocialiteManager($app);
        });

        // bind default HazahUserRespositoryContract
        if (!$this->app->bound(HazahUserRespositoryContract::class)) {
            $this->app->bind(HazahUserRespositoryContract::class, 'App\Repositories\UserRepository');
        }
    }

    public function boot()
    {
        // config
        $config_source = __DIR__ . '/../../config/hazah.php';
        $this->mergeConfigFrom($config_source, 'hazah');
        $this->publishes([$config_source => config_path('hazah.php')], 'hazah');

        // console commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeHazahAuthCommand::class,
            ]);
        }

        // migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../migrations');

        // routes
        $this->loadRoutesFrom(__DIR__ . '/../../routes/hazah-routes.php');
    }

}
