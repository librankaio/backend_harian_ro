<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TformUserController;
use App\Http\Controllers\TharianRoController;
use App\Http\Controllers\TkunjuganRoController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
// Route::get('/harianro', [TharianRoController::class, 'index'])->name('harianro');
// Route::get('/kunjunganro', [TkunjuganRoController::class, 'index'])->name('kunjunganro');
// Route::post('/kunjunganropost', [TkunjuganRoController::class, 'create'])->name('kunjunganropost');
// Route::get('/formuser', [TformUserController::class, 'index'])->name('formuser');