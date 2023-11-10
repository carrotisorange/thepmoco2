
<?php

use App\Http\Controllers\Features\RFPController;
use App\Http\Controllers\LiquidationController;
use Illuminate\Support\Facades\Route;

    Route::prefix('rfp')->group(function(){
        Route::controller(LiquidationController::class)->group(function () {
        Route::prefix('{accountPayable}')->group(function(){
        Route::get('liquidation/step-1','step1')->name('rfp');
        Route::post('liquidation/step-1', 'step1')->name('rfp');
        Route::get('liquidation/step-2', 'step2')->name('rfp');
        Route::get('liquidation/{liquidation}/export','export')->name('rfp');
        Route::get('export/complete','export_complete')->name('rfp');
        });
    });

    Route::controller(RFPController::class)->group(function () {
        Route::prefix('{accountPayable}')->group(function(){
        Route::get('/','show')->name('rfp');
        Route::get('{batch_no}/store', 'store');
        Route::get('step1/export', 'download_step_1');
        Route::get('step-1', 'create_step_1')->name('rfp');
        Route::get('step-2', 'create_step_2')->name('rfp');
        Route::get('step-3', 'create_step_3')->name('rfp');
        Route::get('step-4', 'create_step_4')->name('rfp');
        Route::get('step-5', 'create_step_5')->name('rfp');
        Route::get('step-6', 'create_step_6')->name('rfp');
        Route::get('step-7', 'create_step_7')->name('rfp');
        Route::get('download', 'download');
        });

        Route::get('/', 'index')->name('rfp');
            Route::get('export/{status?}/{created_at?}/{request_for?}/{limitDisplayTo?}','export');
        });
    });
