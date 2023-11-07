<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

Route::controller(CalendarController::class)->group(function () {
    Route::prefix('calendar')->group(function () {
        Route::post('store')->name('calendar.store');
        Route::post('store', 'store')->name('calendar.store');
        Route::patch('update/{id}', 'update')->name('calendar.update');
        Route::delete('destroy/{id}', 'destroy')->name('calendar.destroy');
        Route::get('show/{id}', 'show')->name('calendar.show');
    });

    Route::get('/property/{property}/calendar','index')->name('calendar');
});

