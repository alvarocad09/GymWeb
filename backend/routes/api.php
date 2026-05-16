<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\MedidaController;

// Rutas públicas
Route::post('/register', [UsuarioController::class, 'register']);
Route::post('/login', [UsuarioController::class, 'login']);

// Rutas de usuario autenticado
Route::middleware('auth:sanctum')->group(function () {

    // Usuario
    Route::post('/logout', [UsuarioController::class, 'logout']);
    Route::get('/perfil', [UsuarioController::class, 'perfil']);
    Route::put('/perfil/{id}', [UsuarioController::class, 'update']);

    // Rutinas
    Route::apiResource('rutinas', RutinaController::class);

    // Medidas
    Route::apiResource('medidas', MedidaController::class);

    // Ejercicios y músculos (solo lectura para usuarios normales)
    Route::get('/ejercicios', [EjercicioController::class, 'index']);
    Route::get('/ejercicios/{id}', [EjercicioController::class, 'show']);
    Route::get('/musculos', [EjercicioController::class, 'musculos']);

    // Rutas de administrador
    Route::middleware('admin')->group(function () {

        // Gestión de usuarios
        Route::get('/usuarios', [UsuarioController::class, 'index']);
        Route::delete('/usuarios/{id}', [UsuarioController::class, 'eliminar']);

        // Gestión de ejercicios
        Route::post('/ejercicios', [EjercicioController::class, 'store']);
        Route::put('/ejercicios/{id}', [EjercicioController::class, 'update']);
        Route::delete('/ejercicios/{id}', [EjercicioController::class, 'destroy']);

        // Ver rutinas y medidas de todos los usuarios
        Route::get('/admin/rutinas', [RutinaController::class, 'indexAdmin']);
        Route::get('/admin/medidas', [MedidaController::class, 'indexAdmin']);
    });
});
