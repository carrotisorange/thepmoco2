<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardSalesController;
use App\Http\Controllers\DashboardDevController;

    //Routes for dashboard
Route::prefix('/dashboard')->group(function(){
    Route::get('sales', [DashboardSalesController::class, 'index']);
    Route::get('user/{id:id}/properties', [DashboardSalesController::class, 'show']);
    
    Route::get('dev', [DashboardDevController::class, 'index']);
});