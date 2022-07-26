<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PointController;

Route::prefix('/user/{user}')->group(function(){
    Route::patch('update',[UserController::class, 'update']);
    Route::get('edit',[UserController::class, 'edit'])->name('profile');
    Route::get('point',[PointController::class, 'index'])->name('point');
});

