<?php

namespace App\Providers;

use App\Services\IProjectService;
use App\Services\ITodoService;
use App\Services\ProjectService;
use App\Services\TodoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        $this->app->bind(IProjectService::class, ProjectService::class);
        $this->app->bind(ITodoService::class, TodoService::class);
    }

    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
        //
    }
}
