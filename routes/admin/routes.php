<?php

use App\Http\Controllers\Admin\DefaultController;
use Illuminate\Support\Facades\Route;

Route::domain(config('app.domains.admin_url'))->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->as('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', [DefaultController::class, 'index'])->name('dashboard');
});
