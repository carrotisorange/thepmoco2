<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('/user/{user}')->group(function(){
    Route::patch('update',[UserController::class, 'update']);
    Route::get('edit',[UserController::class, 'edit'])->name('profile');
});

