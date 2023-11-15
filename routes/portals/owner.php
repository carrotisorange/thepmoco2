<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Portals\PortalOwnerController;

Route::prefix('{role_id:id}/owner/{user:username}')->group(function(){
    Route::controller(PortalOwnerController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/unit','show_units')->name('unit');
        Route::get('/bill', 'show_bills')->name('bill');
        Route::get('/collection', 'show_payments')->name('collection');
        Route::get('/remittance', 'show_remittances')->name('remittance');
        Route::get('/concern', 'show_concerns')->name('concern');
        Route::get('/unit/{unit}/guests', 'show_guests')->name('unit');
        Route::get('bulletin','show_bulletin')->name('bulletin');
    });
});



