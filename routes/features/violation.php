<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Features\ViolationController;

    Route::controller(ViolationController::class)->group(function () {
        Route::prefix('violation')->group(function(){
            Route::get('/','index')->name('violation');
            Route::get('{violation}', 'show')->name('violation');
        });
    });
