<?php

namespace App\Providers;

use App\Services\PlanService;
use App\Services\PlanServiceContract;
use Illuminate\Support\ServiceProvider;

class PlanServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(PlanServiceContract::class, PlanService::class);
    }
}
