<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UtilityController;

    Route::controller(UtilityController::class)->group(function () {
        Route::prefix('utility')->group(function(){
            Route::get('/','index')->name('utility');
            Route::get('{batch_no}/{option}','edit')->name('utility');
        });
    });
