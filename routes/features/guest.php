<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\GuestController;

    Route::controller(GuestController::class)->group(function(){
        Route::prefix('guest')->group(function(){
            Route::get('/', 'index')->name('guest');
            Route::get('bill/{bill}/edit', 'edit_bill')->name('bill');
            Route::get('bills', 'show_bills');
            Route::get('booking/{booking:uuid}/edit',  'edit');
            Route::get('bills/{batch_no}/pay', 'store_collections');
            Route::patch('bills/{batch_no}/pay/update', 'update_collections');
            Route::get('collection/{collection}/view', 'show_collections');
            Route::get('collection/{collection}/attachment','view_attachment');
            Route::get('export', 'export');
            Route::get('bill/export', 'export_bill');
        });
    });
