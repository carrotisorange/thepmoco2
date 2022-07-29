<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PointController;

//All routes for user
Route::prefix('user')->group(function(){
    //routes for user crud operations

    Route::patch('{user}/update',[UserController::class, 'update']);
    Route::get('{user}/edit',[UserController::class, 'edit'])->name('profile');

    //route for point crud operations
    Route::get('point',[PointController::class, 'index'])->name('point');
});



