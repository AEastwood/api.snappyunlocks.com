<?php

use Illuminate\Support\Facades\Route;

Route::domain(config('app.domains.admin_url'))->group(function () {
    Route::view('/', 'welcome');

    Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    Route::get('routes', function () {
        $routes = collect(Route::getRoutes())->map(function ($route) {
            return [
                'uri' => $route->uri(),
                'name' => $route->getName(),
            ];
        });

        dump($routes->toArray());
    });
});
