<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantPortalController;
use App\Http\Controllers\TenantController;

    //Routes for dashboard
Route::prefix('{role_id:role_id}/tenant/{user}')->group(function(){
    Route::get('/', [TenantPortalController::class, 'index'])->name('tenant-dashboard');
    Route::get('contracts', [TenantPortalController::class, 'show_contracts'])->name('tenant-contracts');
    Route::get('bills', [TenantPortalController::class, 'show_bills'])->name('tenant-bills');
    Route::get('bills/export', [TenantPortalController::class, 'export_bills']);
    Route::get('payments', [TenantPortalController::class, 'show_collections'])->name('tenant-payments');
    Route::get('concerns', [TenantPortalController::class, 'show_concerns'])->name('tenant-concerns');

     Route::get('ar/{ar}/export', [TenantCollectionController::class, 'export']);
     Route::get('ar/{ar}/view', [TenantCollectionController::class, 'view']);
});

Route::get('/tenant/{uuid:uuid}/user', [TenantController::class, 'generate_credentials']);



