<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Features\BillController;

    Route::controller(BillController::class)->group(function(){
        Route::prefix('bill')->group(function(){
            Route::get('delinquents','showDelinquents')->name('bill');
            Route::get('export/{format}','export');
            Route::get('customized/{batch_no}','bulk_edit')->name('bill');
            Route::get('{batch_no?}/{drafts?}', 'index')->name('bill');
            Route::get('customized/{batch_no}/edit','bulk_edit')->name('bill');
            Route::get('/batch/{batch_no}/drafts','drafts')->name('bill');
            Route::get('{type}/{uuid}/bills','showBills')->name('bill');
        });
    });
