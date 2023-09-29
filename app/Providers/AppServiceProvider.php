<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(TodoGetInfoCommand::class, function ($app) {
            return new TodoGetInfoCommand();
        });

         $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\GetInfo\TodoGetInfoServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\GetInfo\TodoGetInfoService::class
        );

        $this->app->bind(
            \packages\Todolist\Todo\Domain\Todo\TodoRepositoryInterface::class,
            \packages\Todolist\Todo\Infrastructure\QueryBuilder\Todo\TodoRepository::class
        );

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

    /**
     * Register Providers for Production Environment.
     *
     * @return void
     */
}
