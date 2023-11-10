<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Features\ElectionController;

Route::controller(ElectionController::class)->group(function(){
    Route::prefix('election')->group(function(){
        Route::get('/','index')->name('election');
        Route::get('/create', 'create')->name('election');
        Route::prefix('{election}')->group(function(){
            Route::get('create/step-1','edit_step_1')->name('election');
            Route::get('create/step-2', 'create_step_2')->name('election');
            Route::get('export/step-2', 'export_step_2')->name('election');
            Route::get('create/step-3','create_step_3')->name('election');
            Route::get('export/step-3', 'export_step_3')->name('election');
            Route::get('create/step-4', 'create_step_4')->name('election');
            Route::get('create/step-5', 'create_step_5')->name('election');
        });
    });
});
