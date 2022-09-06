<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardSalesController;
use App\Http\Controllers\DashboardDevController;
use App\Http\Controllers\TenantPortalController;

    //Routes for dashboard
Route::prefix('/dashboard')->group(function(){
    Route::get('sales', [DashboardSalesController::class, 'index']);
    Route::get('users', [DashboardSalesController::class, 'show_all_users']);
    Route::get('user/{user}/property', [DashboardSalesController::class, 'show_property']);
    Route::get('user/{user}/activity', [DashboardSalesController::class, 'show_activity']);

    Route::get('dev', [DashboardDevController::class, 'index']);
    Route::get('tenant', [TenantPortalController::class, 'index']);
});