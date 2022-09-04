<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardTenantController;
use App\Http\Controllers\TenantController;

    //Routes for dashboard
Route::prefix('{role_id:role_id}/tenant/{user}')->group(function(){
    Route::get('/', [DashboardTenantController::class, 'index'])->name('tenant-dashboard');
    Route::get('contracts', [DashboardTenantController::class, 'show_contracts'])->name('tenant-contracts');
    Route::get('bills', [DashboardTenantController::class, 'show_bills'])->name('tenant-bills');
    Route::get('payments', [DashboardTenantController::class, 'show_collections'])->name('tenant-payments');
    Route::get('concerns', [DashboardTenantController::class, 'show_concerns'])->name('tenant-concerns');

     Route::get('ar/{ar}/export', [TenantCollectionController::class, 'export']);
     Route::get('ar/{ar}/view', [TenantCollectionController::class, 'view']);
});

Route::get('/tenant/{uuid:uuid}/user', [TenantController::class, 'generate_credentials']);



