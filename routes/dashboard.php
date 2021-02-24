<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\authController;
use App\Http\Controllers\admin\dashboardContoller;




// login 
Route::get('/admin/login', [authController::class, 'login'])->middleware('guest')->name("login");
Route::post('/admin/login', [authController::class, 'loginAdmin'])->middleware('guest');
Route::get('/logout', [authController::class, 'logout'])->middleware('auth');




// admins routes
Route::middleware('auth', 'users')->group(function () {

    Route::prefix('admin')->group(function () {


        // routes to both admins & super admins
        Route::get('', [dashboardContoller::class, 'index']);



        // super admins routes only
        Route::middleware('super')->group(function () {

            






        });
    });
});