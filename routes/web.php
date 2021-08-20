<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin;

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

Auth::routes(['register' => false]);
Route::get('home/sign-out', [Controllers\HomeController::class, 'sign_out'])->name('home.sign-out');

Route::group(['middleware' => 'revalidate'], function() {

    Route::get('log-login', [Admin\HomeController::class, 'log_login'])->name('log-login');
    
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [Admin\HomeController::class, 'index'])->name('dashboard.index');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [Admin\UsersController::class, 'index'])->name('users.index');
        Route::get('management', [Admin\UsersController::class, 'management'])->name('users.management');
        Route::get('role', [Admin\UsersController::class, 'role'])->name('users.role');
    });

});
