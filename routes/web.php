<?php

namespace App\Http\Controllers;

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

require __DIR__.'/auth.php';

Route::get('/', [WebsiteController::class, 'index']);

Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard', function () {
    return view('dashboard');
    })->name('dashboard');

    Route::get('rooms', [RoomController::class, 'index'])->name('rooms');
    Route::get('room/{room}', [RoomController::class, 'show']);

    Route::get('tenants', [TenantController::class, 'index'])->name('tenants');
    Route::get('tenant/{tenant}', [TenantController::class, 'show']);

    Route::get('profile/{username:username}',[UserController::class, 'edit'])->name('profile');

    Route::get('owners', [OwnerController::class, 'index'])->name('owners');
    Route::get('owner/{owner}', [OwnerController::class, 'show']);
});

Route::group(['middleware'=>'auth'], function(){
   Route::get('properties', [PropertyController::class, 'index']);
});
