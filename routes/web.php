<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\CancionController;

//---------------------------------------------
// RUTAS CRUD
//---------------------------------------------

Route::get('/', function () {
    return view('welcome');
});

//AÑADO EL ROUTE MIDDLEWARE AUTH PARA QUE SOLO ENTRE A ESAS RUTAS SI SE HA INICIADO SESION
Route::middleware(['auth'])->group(function () {
    Route::get('canciones', [CancionController::class, 'index'])->name('canciones.index');
    Route::get('canciones/create', [CancionController::class, 'create'])->name('canciones.create');
    Route::post('canciones', [CancionController::class, 'store'])->name('canciones.store');
    Route::get('canciones/{cancion}', [CancionController::class, 'show'])->name('canciones.show');
    Route::get('canciones/{cancion}/edit', [CancionController::class, 'edit'])->name('canciones.edit');
    Route::put('canciones/{cancion}', [CancionController::class, 'update'])->name('canciones.update');
    Route::delete('canciones/{cancion}', [CancionController::class, 'destroy'])->name('canciones.destroy');
});

//---------------------------------------------
//MAILTRAP CON JETSTREAM
//---------------------------------------------

//RUTAS DE AUTENTICACIÓN

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//RUTA PARA VERIFICACIÓN DE CORREO ELECTRÓNICO

Route::get('email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

//RUTA PARA PROCESAR VERIFICACIÓN DE CORREO ELECTRÓNICO

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');


//RUTA PARA REENVIAR EL CORREO DE VERIFICACION
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');