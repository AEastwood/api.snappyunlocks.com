<?php

use Illuminate\Support\Facades\Route;

Route::domain(config('app.domains.api_url'))->group(function () {
    dd('api');
    require_once 'api/routes.php';
});

Route::domain(config('app.domains.admin_url'))->group(function () {
    dd('admin');
    require_once 'admin/routes.php';
});
