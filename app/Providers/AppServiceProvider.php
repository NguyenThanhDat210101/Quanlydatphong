<?php

namespace App\Providers;

use App\Repositories\Interface\DepartmentRepositoryInterface;
use App\Repositories\Interface\MeetroomRepositoryInterface;
use App\Repositories\Interface\TicketDetailRepositoryInterface;
use App\Repositories\Interface\TicketRepositoryInterface;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Repositories\Repository\DepartmentRepository;
use App\Repositories\Repository\MeetroomRepository;
use App\Repositories\Repository\TicketDetailRepository;
use App\Repositories\Repository\TicketRepository;
use App\Repositories\Repository\UserRepository;
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
        $this->app->bind(
            DepartmentRepositoryInterface::class,
            DepartmentRepository::class,
        );

        $this->app->bind(
            MeetroomRepositoryInterface::class,
            MeetroomRepository::class,
        );

        $this->app->bind(
            TicketDetailRepositoryInterface::class,
            TicketDetailRepository::class,
        );

        $this->app->bind(
            TicketRepositoryInterface::class,
            TicketRepository::class,
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
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
}
