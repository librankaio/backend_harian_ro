<?php

use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ExController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\TkunjunganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//API Routes
Route::post('/login', [ApiLoginController::class, '__invoke'])->name('apiLogin');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [ExController::class, 'getUser'])->name('users')->middleware('jwt.verify');
Route::get('/users/{id}', [ExController::class, 'getById'])->name('usersgetid')->middleware('jwt.verify');
Route::post('/postkunjungan', [KunjunganController::class, 'storeKunjungan'])->name('storekunjungan')->middleware('jwt.verify');

Route::group(['prefix' => 'user','middleware' => ['assign.guard:user','jwt.auth']],function ()
{
	// Route::get('/demo','AdminController@demo');
    // Route::get('/users', [ExController::class, 'getUser'])->name('users');
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
