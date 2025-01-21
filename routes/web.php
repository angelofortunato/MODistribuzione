<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProvaController;
use App\Http\Controllers\RegistrationController;
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
// Route homepage
Route::get('/', function () {
    return view('welcome');
});
// Route di Registrazione
Route::get('/register', function () {
    return view('registration');
});
Route::post('register', [RegistrationController::class, 'register']);
// Route di login
Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'authenticate'])->name('loginUser');
// Route di logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logoutUser');
// Route per prove su db
Route::get('/test', [ProvaController::class, 'inserimento']);
Route::get('/simula', [ProvaController::class, 'simulaAcquisto']);
Route::get('/genera', [ProvaController::class, 'generaEntry']);
