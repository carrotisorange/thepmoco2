<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\SubscriptionController;

//All routes for user
Route::prefix('user/{user:username}')->group(function(){
    //routes for user crud operations
    Route::patch('/update',[UserController::class, 'update']);

    Route::get('/unlock', [UserController::class, 'unlock']);

    Route::get('/edit',[UserController::class, 'edit'])->name('profile');

    Route::get('/subscriptions/{external_id:external_id?}',[SubscriptionController::class, 'index'])->name('subscription');

    Route::post('/subscriptions/{external_id:external:id}/unsubscribe',[SubscriptionController::class, 'unsubscribe'])->name('subscription');

    Route::get('/export/{portfolio}',[UserController::class, 'export']);

});

 //route for point crud operations
 Route::get('point',[PointController::class, 'index'])->name('point');

Route::get('users',[UserController::class, 'show_all_users'])->name('user');



