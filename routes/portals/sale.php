<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Portals\PortalSalesController;

Route::prefix('{role_id:id}/sale/{user:username}')->group(function(){
    Route::controller(PortalSalesController::class)->group(function () {
        Route::get('signup', 'signup')->name('signup');
        Route::get('{id}/properties', 'property')->name('signup');
        Route::get('personnel', 'personnel')->name('personnel');
        Route::get('session','session')->name('session');
        Route::get('statistics','statistics')->name('statistics');
    });
});
