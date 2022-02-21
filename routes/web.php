<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::group(['middleware'=>['auth', 'verified']], function(){
    Route::prefix('/property/{property:uuid}')->group(function(){

    Route::get('rooms', [RoomController::class, 'index'])->name('rooms');
   
    Route::get('tenants', [TenantController::class, 'index'])->name('tenants');
    
    Route::get('owners', [OwnerController::class, 'index'])->name('owners');
    
    Route::get('employees', [EmployeeController::class, 'index'])->name('employees');
    
    Route::get('/contracts', [ContractController::class, 'index'])->name('contracts');

    Route::get('/', [PropertyController::class, 'show'])->name('dashboard');
    
    });

    Route::get('room/{room:uuid}', [RoomController::class, 'show']);
    Route::get('room/{batch_no}/create', [RoomController::class, 'create']);
    Route::post('room/{batch_no}/store', [RoomController::class, 'store']);
    Route::get('room/{batch_no}/edit', [RoomController::class, 'edit']);
    Route::delete('room/{uuid}', [RoomController::class, 'destroy']);

    Route::get('tenant/{tenant}', [TenantController::class, 'show']);
    Route::get('owner/{owner}', [OwnerController::class, 'show']);
    Route::get('employee/{user:username}', [EmployeeController::class, 'show']);

    Route::get('properties', [PropertyController::class, 'index']);
    Route::get('property/{random_str}/create/', [PropertyController::class, 'create']);
    Route::post('property/{random_str}/store', [PropertyController::class, 'store']);

    Route::get('/profile/{username:username}',[UserController::class, 'edit'])->name('profile');
});
