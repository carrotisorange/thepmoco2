<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\FinancialController;

    Route::controller(FinancialController::class)->group(function () {
        Route::prefix('financial')->group(function(){
            Route::get('/', 'index')->name('financial');
            Route::get('export/{startDate}/{endDate}', 'export');
        });
    });
