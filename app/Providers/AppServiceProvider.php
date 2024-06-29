<?php

namespace App\Providers;

use App\Repositories\Menu\MenuRepository;
use App\Repositories\RepositoryInterface;
use App\Repositories\Reservation\ReservationRepository;
use App\Repositories\Restaurant\RestaurantRepository;
use App\Repositories\Review\ReviewRepository;
use App\Repositories\Table\TableRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('MenuRepository', function () {
            return new MenuRepository();
        });

        $this->app->bind('ReservationRepository', function () {
            return new ReservationRepository();
        });

        $this->app->bind('RestaurantRepository', function () {
            return new RestaurantRepository();
        });

        $this->app->bind('ReviewRepository', function () {
            return new ReviewRepository();
        });

        $this->app->bind('TableRepository', function () {
            return new TableRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
