<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdeudosController;

// Redirigir la raíz a /adeudos (sin duplicar rutas)
Route::redirect('/', '/adeudos');

// Generar todas las rutas CRUD (incluye DELETE)
Route::resource('adeudos', AdeudosController::class);


