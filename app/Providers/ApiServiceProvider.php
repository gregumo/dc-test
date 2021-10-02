<?php

namespace App\Providers;

use App\Api\Client\NantesMetropoleApiClient;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

/**
 * @author Grégoire Humeau <gregoire.humeau@gmail.com>
 */
class ApiServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(NantesMetropoleApiClient::class, function () {
            return new NantesMetropoleApiClient(new Client(), config('api.nantes_metropole_base_url'));
        });
    }


    public function provides()
    {
        return ['App\Api\Client\NantesMetropoleApiClient'];
    }
}
