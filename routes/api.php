<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdeudosController;


Route::apiResource('adeudos', AdeudosController::class);


