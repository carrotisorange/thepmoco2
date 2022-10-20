<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ParticularController;
use App\Http\Controllers\PropertyBillerController;
use App\Http\Controllers\PropertyController;

Route::group(['middleware'=>['auth', 'verified']], function(){
    Route::prefix('/property')->group(function(){
    Route::controller(PropertyController::class)->group(function () {
    Route::get('/','index')->name('property');
    Route::get('{random_str}/unlock/', 'unlock')->name('property');
    Route::get('/{property}/success','success');
    Route::get('{random_str}/create', 'create')->name('property');
    Route::post('{random_str}/store', 'store');
    });
    });

    //Routes for Particular
    Route::prefix('particular')->group(function(){
    Route::post('store', [ParticularController::class, 'store']);
    });

    //Routes for Biller
    Route::prefix('biller')->group(function(){
    Route::post('store', [PropertyBillerController::class, 'store']);
    });
});