<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProvaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return 'Benvenuto in MO: Sempre un passo avanti a voi!';
});

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'authenticate'])->name('loginUser');

Route::get('/test', [ProvaController::class, 'inserimento']);
Route::get('/simula', [ProvaController::class, 'simulaAcquisto']);
Route::get('/genera', [ProvaController::class, 'generaEntry']);
