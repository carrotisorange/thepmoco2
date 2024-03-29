<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Utilities\PointController;
use App\Http\Controllers\Subfeatures\SubscriptionController;

//All routes for user
Route::prefix('user/{user:username}')->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::patch('/update','update');
        Route::get('/unlock', 'unlock');
        Route::get('/edit','edit')->name('profile');
        Route::get('/export/{portfolio}','export');
    });
    Route::get('/subscriptions/{external_id:external_id?}',[SubscriptionController::class, 'index'])->name('subscription');
    Route::post('/subscriptions/{external_id:external:id}/unsubscribe',[SubscriptionController::class, 'unsubscribe'])->name('subscription');
});

 //route for point crud operations
 Route::get('point',[PointController::class, 'index'])->name('point');

Route::get('users',[UserController::class, 'show_all_users'])->name('user');



