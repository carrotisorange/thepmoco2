<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardTenantController;
use App\Http\Controllers\TenantController;

    //Routes for dashboard
Route::prefix('{role_id:id}/{user:username}')->group(function(){
    Route::get('dashboard', [DashboardTenantController::class, 'index']);
    Route::get('contracts', [DashboardTenantController::class, 'show_contracts']);
    Route::get('bills', [DashboardTenantController::class, 'show_bills']);
    Route::get('collections', [DashboardTenantController::class, 'show_collections']);
    Route::get('concerns', [DashboardTenantController::class, 'show_concerns']);

     Route::get('ar/{ar}/export', [TenantCollectionController::class, 'export']);
     Route::get('ar/{ar}/view', [TenantCollectionController::class, 'view']);
});

Route::get('/tenant/{uuid:uuid}/user', [TenantController::class, 'generate_credentials']);



