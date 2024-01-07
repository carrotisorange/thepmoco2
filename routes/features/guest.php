<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Features\GuestController;

    Route::controller(GuestController::class)->group(function(){
        Route::prefix('guest')->group(function(){
            Route::get('/', 'index')->name('guest');
            Route::get('{guest}', 'show')->name('guest');
            Route::get('bill/{bill}/edit', 'edit_bill')->name('bill');
            // Route::get('{guest}/bills', 'show_bills');
            Route::get('booking/{booking:uuid}/edit',  'edit');
            Route::get('{guest}/bills/{batch_no}/pay', 'store_collections');
            Route::patch('{guest}/bills/{batch_no}/pay/update', 'update_collections');
            Route::get('{guest}/collection/{collection}/view', 'show_collections');
            Route::get('{guest}/collection/{collection}/attachment','view_attachment');
            Route::get('{guest}/export', 'export');
            Route::get('{guest}/bill/export', 'export_bill');
        });
    });
