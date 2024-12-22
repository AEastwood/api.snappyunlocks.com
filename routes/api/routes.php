<?php

use Illuminate\Support\Facades\Route;

Route::domain(config('app.domains.api_url'))->group(function () {
    Route::get('/', function () {
        return response()->json([
            'message' => 'just doing api stuff idk :/'
        ]);
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
