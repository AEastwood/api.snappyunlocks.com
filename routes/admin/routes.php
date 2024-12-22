<?php

use Illuminate\Support\Facades\Route;

Route::domain(config('app.domains.admin_url'))->group(function () {
    Route::view('/', 'welcome');
});
