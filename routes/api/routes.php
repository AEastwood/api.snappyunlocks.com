<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'just doing api stuff idk :/'
    ]);
});
