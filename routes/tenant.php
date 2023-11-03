<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalTenantController;
use App\Http\Controllers\TenantController;

Route::prefix('{role_id}/tenant/{user:username}')->group(function(){
    Route::controller(PortalTenantController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('contract','show_contracts')->name('contract');
        Route::get('bill', 'show_bills')->name('bill');
        Route::get('bills/export','export_bills');
        Route::get('collection','show_collections')->name('collection');
        Route::get('payments/{pending:status}','show_collections_pending')->name('collection');
        Route::get('payments_request/{batch_no:batch_no}','payment_request_edit')->name('collection');
        Route::get('payments_request/{batch_no:batch_no}/destroy', 'payment_request_destroy');
        Route::patch('payments_request/{batch_no:batch_no}/update', 'payment_request_update');
        Route::get('payments_request/{batch_no:batch_no}/deny','payment_request_deny');
        Route::get('payments_request/{paymentrequest}/download', 'payment_request_download');
        Route::get('concern','show_concerns')->name('concern');
        Route::get('concerns/create','create_concerns')->name('concern');
        Route::get('concerns/{concern}/download', 'download_concerns');
        Route::post('concerns/store', 'store_concern');
        Route::get('concerns/{concern}', 'edit_concern')->name('concern');
        Route::get('concerns/{concern}/success','success_concerns')->name('concern');
        Route::get('bulletin','show_bulletin')->name('bulletin');
    });

     Route::get('collection/{collection}/export', [TenantCollectionController::class, 'export']);
     Route::get('collection/{collection}/view', [TenantCollectionController::class, 'view']);
});

Route::get('/tenant/{uuid:uuid}/user', [TenantController::class, 'generate_credentials']);
