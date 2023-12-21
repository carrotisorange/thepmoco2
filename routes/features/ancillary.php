<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Features\AncillaryController;

    Route::controller(AncillaryController::class)->group(function(){
        Route::prefix('ancillary')->group(function(){
            Route::get('/','index')->name('ancillary');
        });
    });
