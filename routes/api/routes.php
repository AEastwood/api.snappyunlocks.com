<?php

use App\Http\Controllers\API\DefaultController;
use Illuminate\Support\Facades\Route;

Route::domain(config('app.domains.api_url'))->as('api.')->group(function () {
    Route::get('/', [DefaultController::class, 'index'])->name('index');
});
