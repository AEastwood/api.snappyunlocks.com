<?php

use App\Http\Middleware\API;
use Illuminate\Support\Facades\Route;

Route::domain(config('app.domains.api_url'))->middleware(API::class)->group(function () {
    require_once base_path('routes/api/routes.php');
});

Route::domain(config('app.domains.admin_url'))->group(function () {
    require_once base_path('routes/admin/routes.php');
});

