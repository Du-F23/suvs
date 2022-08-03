<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
        $users = \App\Models\User::count();
        $clientes = \App\Models\Cliente::count();
        $autos = \App\Models\Auto::count();
        $ventas = \App\Models\Venta::count();
		return view('dashboard', compact('users', 'clientes', 'autos', 'ventas'));
	})->name('dashboard');

    //Modificaciones
    Route::get('/modificaciones', [ModificacionController::class, 'index'])->name('modificaciones.index');
    Route::get('/modificaciones/create', [ModificacionController::class, 'create'])->name('modificaciones.create');
    Route::post('/modificaciones', [ModificacionController::class, 'store'])->name('modificaciones.store');
    Route::get('/modificaciones/{modificacion}', [ModificacionController::class, 'show'])->name('modificaciones.show');
    Route::get('/modificaciones/{modificacion}/edit', [ModificacionController::class, 'edit'])->name('modificaciones.edit');
    Route::put('/modificaciones/{modificacion}', [ModificacionController::class, 'update'])->name('modificaciones.update');
    Route::delete('/modificaciones/{modificacion}', [ModificacionController::class, 'destroy'])->name('modificaciones.destroy');

    //clientes

    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    //ventas
    Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
    Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
    Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
    Route::get('/ventas/{venta}', [VentaController::class, 'show'])->name('ventas.show');
    Route::get('/ventas/{venta}/edit', [VentaController::class, 'edit'])->name('ventas.edit');
    Route::put('/ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update');
    Route::delete('/ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy');

    //autos
    Route::get('/autos', [AutoController::class, 'index'])->name('autos.index');
    Route::get('/autos/create', [AutoController::class, 'create'])->name('autos.create');
    Route::post('/autos', [AutoController::class, 'store'])->name('autos.store');
    Route::get('/autos/{auto}', [AutoController::class, 'show'])->name('autos.show');
    Route::get('/autos/{auto}/edit', [AutoController::class, 'edit'])->name('autos.edit');
    Route::put('/autos/{auto}', [AutoController::class, 'update'])->name('autos.update');
    Route::delete('/autos/{auto}', [AutoController::class, 'destroy'])->name('autos.destroy');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
