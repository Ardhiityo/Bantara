<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \App\Services\Interfaces\MemberInterface::class,
            \App\Services\Repositories\MemberRepository::class
        );
        $this->app->singleton(
            \App\Services\Interfaces\PositionInterface::class,
            \App\Services\Repositories\PositionRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
