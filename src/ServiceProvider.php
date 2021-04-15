<?php

namespace Qugo\RabbitMQTransfer;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . DIRECTORY_SEPARATOR . 'src/config/qugo-rabbit-transfer.php';
        $this->mergeConfigFrom($configPath, 'qugo-rabbit-transfer');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
