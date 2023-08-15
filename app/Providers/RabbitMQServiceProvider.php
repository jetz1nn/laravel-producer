<?php

namespace App\Providers;

use App\Interfaces\ProducerServiceInterface;
use App\Services\ProducerService;
use Illuminate\Support\ServiceProvider;

class RabbitMQServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ProducerServiceInterface::class, app(ProducerService::class));
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
