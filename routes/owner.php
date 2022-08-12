<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardOwnerController;
use App\Http\Controllers\TenantController;

    //Routes for dashboard
Route::prefix('owner/user/{user}')->group(function(){
    Route::get('dashboard', [DashboardOwnerController::class, 'index']);
    
    // Route::get('contracts', [DashboardTenantController::class, 'show_contracts']);
    // Route::get('bills', [DashboardTenantController::class, 'show_bills']);
    // Route::get('payments', [DashboardTenantController::class, 'show_payments']);
    // Route::get('concerns', [DashboardTenantController::class, 'show_concerns']);

    //  Route::get('ar/{ar}/export', [TenantCollectionController::class, 'export']);
    //  Route::get('ar/{ar}/view', [TenantCollectionController::class, 'view']);
});

// Route::get('/tenant/{uuid:uuid}/user', [TenantController::class, 'generate_credentials']);
