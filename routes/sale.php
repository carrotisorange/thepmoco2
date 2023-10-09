<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesPortalController;

Route::prefix('{role_id:id}/sale/{user:username}')->group(function(){
    Route::controller(SalesPortalController::class)->group(function () {
        Route::get('/signup', 'signup')->name('signup');
        Route::get('/personnel', 'user')->name('personnel');
        Route::get('/activity','activity')->name('personnel');
    });
});
