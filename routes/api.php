<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Reservation\ReservationController;
use App\Http\Controllers\Restaurant\RestaurantController;
use App\Http\Controllers\Review\ReviewController;
use App\Http\Controllers\Table\TableController;
use App\Http\Middleware\APIAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::delete('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('restaurants')->group(function () {
    Route::get('/', [RestaurantController::class, 'index']);
    Route::post('/create', [RestaurantController::class, 'create']);
    Route::put('/update/{id}', [RestaurantController::class, 'update']);
    Route::delete('/delete/{id}', [RestaurantController::class, 'delete']);
})->middleware(APIAuthMiddleware::class);

Route::prefix('tables')->group(function () {
    Route::get('/restaurant/{restaurant_id}', [TableController::class, 'index']);
    Route::post('/create/restaurant/{restaurant_id}', [TableController::class, 'create']);
    Route::put('/update/restaurant/{restaurant_id}/{table_id}', [TableController::class, 'update']);
    Route::delete('/delete/restaurant/{restaurant_id}/{table_id}', [TableController::class, 'delete']);
})->middleware(APIAuthMiddleware::class);

Route::prefix('menus')->group(function () {
    Route::get('/restaurant/{restaurant_id}', [MenuController::class, 'index']);
    Route::post('/create/restaurant/{restaurant_id}', [MenuController::class, 'create']);
    Route::put('/update/restaurant/{restaurant_id}/{menu_id}', [MenuController::class, 'update']);
    Route::delete('/delete/restaurant/{restaurant_id}/{menu_id}', [MenuController::class, 'delete']);
})->middleware(APIAuthMiddleware::class);

Route::prefix('reservations')->group(function () {
    Route::get('/restaurant/{restaurant_id}', [ReservationController::class, 'index']);
    Route::post('/create/restaurant/{restaurant_id}', [ReservationController::class, 'create']);
    Route::put('/update/restaurant/{restaurant_id}/{reservation_id}',  [ReservationController::class, 'update']);
    Route::delete('/delete/restaurant/{restaurant_id}/{reservation_id}',  [ReservationController::class, 'delete']);
})->middleware(APIAuthMiddleware::class);

Route::prefix('reviews')->group(function () {
    Route::post('/create/restaurant/{restaurant_id}', [ReviewController::class, 'create']);
    Route::get('/restaurant/{restaurant_id}', [ReviewController::class, 'index']);
})->middleware(APIAuthMiddleware::class);
