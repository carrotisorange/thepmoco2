<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardOwnerController;
use App\Http\Controllers\OwnerController;

    //Routes for dashboard
Route::prefix('{role_id:id}/owner/{user}')->group(function(){
    Route::get('/', [DashboardOwnerController::class, 'index']);
    
    // Route::get('contracts', [TenantPortalController::class, 'show_contracts']);
    // Route::get('bills', [TenantPortalController::class, 'show_bills']);
    // Route::get('payments', [TenantPortalController::class, 'show_payments']);
    // Route::get('concerns', [TenantPortalController::class, 'show_concerns']);

    //  Route::get('ar/{ar}/export', [TenantCollectionController::class, 'export']);
    //  Route::get('ar/{ar}/view', [TenantCollectionController::class, 'view']);
});

// Route::get('/tenant/{uuid:uuid}/user', [TenantController::class, 'generate_credentials']);
