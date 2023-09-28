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

        // $this->app->bind(Domain\Todo\TodoRepository::class, Infrastructure\Todo\TodoRepository::class);

        // $this->app->bind(
        //     packages\Todolist\Todo\UseCase\Todo\GetInfo\TodoGetInfoServiceInterface::class,
        //     packages\Todolist\Todo\Application\Todo\GetInfo\TodoGetInfoService::class
        // );
        // dd(123);
        
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
        // $env = env('APP_ENV');
        // switch ($env) {
        // case('production'):
        //     $this->registerForProduction();
        //     break;
        
        // case('testing'):
        //     $this->registerForLocalRdbByQueryBuilder();
        //     break;

        // case('testing.inmemory'):
        //     $this->registerForLocalRdbByEloquent();
        //     break;

        // case('testing.inmemory'):
        //     $this->registerForLocalInMemory();
        //     break;

        // default:
        //     $this->registerForProduction();
        // }

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
    private function registerForProduction()
    {
        // Application Service.
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\Register\TodoRegisterServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\Register\TodoRegisterService::class
        );
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\GetInfo\TodoGetInfoServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\GetInfo\TodoGetInfoService::class
        );
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\Update\TodoUpdateServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\Update\TodoUpdateService::class
        );
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\Delete\TodoDeleteServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\Delete\TodoDeleteService::class
        );

        // Repository
        $this->app->bind(
            \packages\Todolist\Todo\Domain\Todo\TodoRepositoryInterface::class,
            \packages\Todolist\Todo\Infrastructure\QueryBuilder\Todo\TodoRepository::class
        );

        // Factory
        $this->app->bind(
            \packages\Todolist\Todo\Domain\Todo\TodoFactoryInterface::class,
            \packages\Todolist\Todo\Infrastructure\QueryBuilder\Todo\TodoRepository::class
        );
    }

    /**
     * Register Providers.
     *
     * @return void
     */
    private function registerForLocalRdbByQueryBuilder()
    {
        // Application Service.
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\Register\TodoRegisterServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\Register\TodoRegisterService::class
        );
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\GetInfo\TodoGetInfoServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\GetInfo\TodoGetInfoService::class
        );
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\Update\TodoUpdateServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\Update\TodoUpdateService::class
        );
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\Delete\TodoDeleteServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\Delete\TodoDeleteService::class
        );

        // Repository
        $this->app->singleton(
            \packages\Todolist\Todo\Domain\Todo\TodoRepositoryInterface::class,
            \packages\Todolist\Todo\Infrastructure\QueryBuilder\Todo\TodoRepository::class
        );

        // Factory
        $this->app->bind(
            \packages\Todolist\Todo\Domain\Todo\TodoFactoryInterface::class,
            \packages\Todolist\Todo\Infrastructure\QueryBuilder\Todo\TodoFactory::class
        );
    }

    /**
     * Register Providers.
     *
     * @return void
     */
    private function registerForLocalRdbByEloquent()
    {
        // Application Service.
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\Register\TodoRegisterServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\Register\TodoRegisterService::class
        );
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\GetInfo\TodoGetInfoServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\GetInfo\TodoGetInfoService::class
        );
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\Update\TodoUpdateServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\Update\TodoUpdateService::class
        );
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\Delete\TodoDeleteServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\Delete\TodoDeleteService::class
        );

        // Repository
        $this->app->singleton(
            \packages\Todolist\Todo\Domain\Todo\TodoRepositoryInterface::class,
            \packages\Todolist\Todo\Infrastructure\Eloquent\Todo\TodoRepository::class
        );

        // Factory
        $this->app->bind(
            \packages\Todolist\Todo\Domain\Todo\TodoFactoryInterface::class,
            \packages\Todolist\Todo\Infrastructure\Eloquent\Todo\TodoFactory::class
        );

    }

    /**
     * Register Providers.
     *
     * @return void
     */
    private function registerForLocalInMemory()
    {
        // Application Service.
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\Register\TodoRegisterServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\Register\TodoRegisterService::class
        );
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\GetInfo\TodoGetInfoServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\GetInfo\TodoGetInfoService::class
        );
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\Update\TodoUpdateServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\Update\TodoUpdateService::class
        );
        $this->app->bind(
            \packages\Todolist\Todo\UseCase\Todo\Delete\TodoDeleteServiceInterface::class,
            \packages\Todolist\Todo\Application\Todo\Delete\TodoDeleteService::class
        );

        // Repository
        $this->app->singleton(
            \packages\Todolist\Todo\Domain\Todo\TodoRepositoryInterface::class,
            \packages\Todolist\Todo\Infrastructure\InMemory\Todo\InMemoryTodoRepository::class
        );

        // Factory
        $this->app->bind(
            \packages\Todolist\Todo\Domain\Todo\TodoFactoryInterface::class,
            \packages\Todolist\Todo\Infrastructure\InMemory\Todo\InMemoryTodoFactory::class
        );
    }
}
