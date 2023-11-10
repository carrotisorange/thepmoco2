<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Features\ContractController;

    Route::controller(ContractController::class)->group(function () {
        Route::prefix('contract')->group(function () {
            Route::post('{contract}/moveout/force','force_moveout');
            Route::get('{status}', 'show_moveout_request')->name('contract');
            Route::get('/', 'index')->name('contract');
        });
    });

