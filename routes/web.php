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

    Route::get('units', [UnitController::class, 'index'])->name('units');
   
    Route::get('tenants', [TenantController::class, 'index'])->name('tenants');
    
    Route::get('owners', [OwnerController::class, 'index'])->name('owners');

     Route::get('concerns', [ConcernController::class, 'index'])->name('concerns');
    
    Route::get('team', [TeamController::class, 'index'])->name('team');
    
    Route::get('contracts', [ContractController::class, 'index'])->name('contracts');

    Route::get('enrollees', [EnrolleeController::class, 'index'])->name('enrollees');

    Route::get('bills', [BillController::class, 'index'])->name('bills');

    Route::get('particulars', [ParticularController::class, 'index']);

    Route::get('collections', [CollectionController::class, 'index'])->name('collections');

    Route::get('/', [PropertyController::class, 'show'])->name('dashboard');    
    Route::get('edit', [PropertyController::class, 'edit']);
    Route::patch('update',[PropertyController::class, 'update']);

    Route::get('roles', [PropertyRoleController::class, 'index']);

    Route::get('/team/{random_str}/create', [TeamController::class, 'create']);
    
    });

    Route::get('unit/{unit:uuid}', [UnitController::class, 'show']);
    Route::get('unit/{batch_no}/create', [UnitController::class, 'create']);
    Route::post('unit/{batch_no}/store', [UnitController::class, 'store']);
    //edit multiple units
    Route::get('units/{batch_no}/edit', [UnitController::class, 'bulk_edit']);
    //update multiple units
    Route::patch('units/{batch_no}/update', [UnitController::class, 'bulk_update']);

    //edit single unit
    Route::get('unit/{unit}/edit', [UnitController::class, 'edit']);
    //update single unit
    Route::patch('unit/{unit}/update', [UnitController::class, 'update']);

    Route::delete('unit/{uuid:uuid}/delete', [UnitController::class, 'destroy']);
    Route::patch('unit/{batch_no}/update', [UnitController::class, 'update']);

    //edit an individual unit


    Route::post('building/{random_str}/store',[BuildingController::class, 'store']);

    Route::get('tenant/{tenant}', [TenantController::class, 'show']);
    Route::get('owner/{owner}', [OwnerController::class, 'show']);
  

    Route::get('properties', [PropertyController::class, 'index']);
    Route::get('property/{random_str}/create/', [PropertyController::class, 'create']);
    Route::post('property/{random_str}/store', [PropertyController::class, 'store']);

    Route::get('team/{random_str}/create', [TeamController::class, 'create']);
    Route::get('team/{user:username}/edit', [TeamController::class, 'edit']);
    Route::post('team/{random_str}/store', [TeamController::class, 'store']);
    Route::patch('team/{user:username}/update', [TeamController::class, 'update']);

    //Creating contract
    //1
    Route::get('unit/{unit}/tenant/{random_str}/create', [TenantController::class, 'create']);
    Route::post('unit/{unit}/tenant/{random_str}/store', [TenantController::class, 'store']);
    //2
    Route::get('unit/{unit}/tenant/{tenant}/contract/{random_str}/create', [ContractController::class, 'create']);
    Route::post('unit/{unit}/tenant/{tenant}/contract/{random_str}/store', [ContractController::class, 'store']);
    //3
    Route::get('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/create', [BillController::class, 'create']);
    Route::post('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/store', [BillController::class,'store']);
    Route::delete('bill/{bill}/delete', [BillController::class, 'destroy']);
    //4
 
    Route::get('unit/{unit}/enrollees/{random_str}/create', [EnrolleeController::class, 'create']);
    Route::post('unit/{unit}/enrollees/{random_str}/store', [EnrolleeController::class, 'store']);

    Route::get('/profile/{username:username}',[UserController::class, 'edit'])->name('profile');

    Route::post('/particular/{random_str}/store', [ParticularController::class, 'store']);
    Route::get('/particular/{random_str}/create', [ParticularController::class, 'create']);

    Route::get('/particular/{random_str}/store', [ParticularController::class, 'store']);

    Route::get('/documentation', [DocumentationController::class, 'index'])->name('documentation');
});
