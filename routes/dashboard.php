<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesPortalController;
use App\Http\Controllers\DevPortalController;
use App\Http\Controllers\TenantPortalController;

    //Routes for dashboard
Route::prefix('/dashboard')->group(function(){
    Route::get('sales', [SalesPortalController::class, 'index']);
    Route::get('users', [SalesPortalController::class, 'show_all_users']);
    Route::get('user/{user}/property', [SalesPortalController::class, 'show_property']);
    Route::get('user/{user}/activity', [SalesPortalController::class, 'show_activity']);
    
    Route::get('tenant', [TenantPortalController::class, 'index']);
});