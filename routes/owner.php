<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerPortalController;
use App\Http\Controllers\OwnerController;

Route::prefix('{role_id:id}/owner/{user}')->group(function(){
    Route::controller(OwnerPortalController::class)->group(function () {
        Route::get('/', 'index')->name('owner-dashboard');
        Route::get('/units','show_units')->name('owner-units');
        Route::get('/bills', 'show_bills')->name('owner-bills');
        Route::get('/payments', 'show_payments')->name('owner-payments');
        Route::get('/concerns', 'show_concerns')->name('owner-concerns');
        Route::get('/unit/{unit}/guests', 'show_guests')->name('owner-units');
    });
});

Route::get('/owner/{uuid:uuid}/user', [OwnerController::class, 'generate_credentials']);

