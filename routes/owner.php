<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerPortalController;

Route::prefix('{role_id:id}/owner/{user}')->group(function(){
    Route::get('/', [OwnerPortalController::class, 'index'])->name('owner-dashboard');
    Route::get('/units', [OwnerPortalController::class, 'show_units'])->name('owner-units');
    Route::get('/bills', [OwnerPortalController::class, 'show_bills'])->name('owner-bills');
    Route::get('/payments', [OwnerPortalController::class, 'show_payments'])->name('owner-payments');
    Route::get('/concerns', [OwnerPortalController::class, 'show_concerns'])->name('owner-concerns');
    
});

