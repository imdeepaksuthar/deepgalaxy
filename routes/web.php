<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserDataController;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/changeStatus', [UserDataController::class, 'changeStatusFun']);
Route::get('/contactUs', [App\Http\Controllers\HomeWebController::class, 'index'])->name('contactUs');



Route::group(['middleware' => ['role:admin','auth']], function () { 
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'AdminHome']);
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'AdminHome'])->name('home');
        Route::resource('/user-data', UserDataController::class)->names([
            'index' => 'user-data',
        ]);
        // Route::get('/changeStatus', [UserDataController::class, 'changeStatusFun']);
        // Route::resource('/user-data', UserDataController::class, ['as' => 'user-data']);
        Route::get('/add-details/{id}', [UserDataController::class, 'AddDetails'])->name('Add-Details');
    });
});

Route::group(['middleware' => ['role:user','auth']], function () { 
    Route::get('home', [App\Http\Controllers\HomeController::class, 'Home'])->name('user.home');
});
