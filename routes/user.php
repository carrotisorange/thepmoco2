<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\SubscriptionController;

//All routes for user
Route::prefix('user')->group(function(){
    //routes for user crud operations
    Route::patch('{user}/update',[UserController::class, 'update']);

    Route::get('{user}/unlock', [UserController::class, 'unlock']);

    Route::get('{user}/edit',[UserController::class, 'edit'])->name('profile');

    Route::get('{username}/subscriptions',[SubscriptionController::class, 'index'])->name('subscription');

    Route::post('{user}/subscriptions/{external_id:external:id}/unsubscribe',[SubscriptionController::class, 'unsubscribe'])->name('subscription');

    //route for point crud operations
    Route::get('point',[PointController::class, 'index'])->name('point');

    Route::get('{user}/export/{portforlio}',[UserController::class, 'export']);
});

Route::get('users',[UserController::class, 'show_all_users'])->name('user');



