<?php

namespace App\Providers;

use App\Services\ListenLectureService;
use App\Services\ListenLectureServiceContract;
use Illuminate\Support\ServiceProvider;

class ListenLectureServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ListenLectureServiceContract::class, ListenLectureService::class);
    }
}
