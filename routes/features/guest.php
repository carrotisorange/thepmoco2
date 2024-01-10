<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Features\GuestController;

    Route::controller(GuestController::class)->group(function(){
        Route::prefix('guest')->group(function(){
            Route::get('/', 'index')->name('guest');
            Route::get('booking/{booking:uuid}/edit', 'edit');
            Route::prefix('{guest}')->group(function(){
                Route::get('/', 'show')->name('guest');
                Route::get('collection/{collection}/view', 'show_collections');
                Route::get('collection/{collection}/attachment','view_attachment');
                Route::get('export', 'export');
                Route::get('bill/export', 'export_bill');
            });
        });
    });
