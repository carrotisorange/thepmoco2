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

    Route::get('/bills', [BillController::class, 'index'])->name('bills');

    Route::get('/particulars', [ParticularController::class, 'index']);

    Route::get('/collections', [CollectionController::class, 'index'])->name('collections');

    Route::get('/', [PropertyController::class, 'show'])->name('dashboard');    
    Route::get('/edit', [PropertyController::class, 'edit']);

    Route::get('roles', [PropertyRoleController::class, 'index']);
    
    });

    Route::get('room/{room:uuid}', [RoomController::class, 'show']);
    Route::get('room/{batch_no}/create', [RoomController::class, 'create']);
    Route::post('room/{batch_no}/store', [RoomController::class, 'store']);
    Route::get('room/{batch_no}/edit', [RoomController::class, 'edit']);
    Route::delete('room/{uuid:uuid}/delete', [RoomController::class, 'destroy']);
    Route::patch('room/{batch_no}/update', [RoomController::class, 'update']);

    Route::post('building/{random_str}/store',[BuildingController::class, 'store']);

    Route::get('tenant/{tenant}', [TenantController::class, 'show']);
    Route::get('owner/{owner}', [OwnerController::class, 'show']);
  

    Route::get('properties', [PropertyController::class, 'index']);
    Route::get('property/{random_str}/create/', [PropertyController::class, 'create']);
    Route::post('property/{random_str}/store', [PropertyController::class, 'store']);

    Route::get('employee/{random_str}/create', [EmployeeController::class, 'create']);
    Route::get('employee/{user:username}/edit', [EmployeeController::class, 'edit']);
    Route::post('employee/{random_str}/store', [EmployeeController::class, 'store']);
    Route::patch('employee/{user:username}/update', [EmployeeController::class, 'update']);

    Route::get('room/{room}/contract/{random_str}/create', [ContractController::class, 'create']);
    Route::post('room/{room}/contract/{random_str}/store', [ContractController::class, 'store']);

    Route::get('/profile/{username:username}',[UserController::class, 'edit'])->name('profile');

    Route::post('/particular/{random_str}/store', [ParticularController::class, 'store']);
    Route::get('/particular/{random_str}/create', [ParticularController::class, 'create']);

    Route::get('/particular/{random_str}/store', [ParticularController::class, 'store']);

    Route::get('/documentation', [DocumentationController::class, 'index'])->name('documentation');
});
