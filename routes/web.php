<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
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
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
// Route di logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logoutUser');

// Route per Admin
Route::middleware(['auth', 'admin'])->group(function () {
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.index');
    // Route Admin per la gestione prodotti
    Route::get('/prodotti', [ProductController::class, 'prodotti'])->name('admin.prodotti');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/prodotto/crea', [ProductController::class, 'create'])->name('products.create');
    Route::post('/prodotto/crea', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    // Route Admin per la gestione Utenti
    Route::get('/utenti', [UserController::class, 'utenti'])->name('admin.utenti');
    Route::get('/utenti/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/utenti/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/utenti/{id}/toggle-active', [UserController::class, 'toggleActive'])->name('users.toggleActive');
    Route::get('/admin/visura/{user}', [AdminController::class, 'servePdf'])->name('admin.servePdf');
    // Route Admin per la gestione Ordini
    Route::get('/ordini', [ProductUserController::class, 'index'])->name('admin.product_user');
    // Route generazione elementi nel database
    Route::get('/generate-products/{count}', [ProductController::class, 'generateProducts']);
    Route::get('/generate-users/{count}', [UserController::class, 'generateUsers']);
});
