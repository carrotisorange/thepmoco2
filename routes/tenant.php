<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalTenantController;
use App\Http\Controllers\TenantController;

//Routes for tenant
// Route::domain('{username}.' . env('APP_URL'))->group(function () {
//     Route::get('posts', function () {
//         return 'Second subdomain landing page';
//     });
// });

Route::prefix('{role_id}/tenant/{user}')->group(function(){
    Route::controller(PortalTenantController::class)->group(function () {
        Route::get('/', 'index')->name('tenant-dashboard');
        Route::get('contracts','show_contracts')->name('tenant-contracts');
        Route::get('bills', 'show_bills')->name('tenant-bills');
        Route::get('bills/export','export_bills');
        Route::get('payments','show_collections')->name('tenant-payments');
        Route::get('payments/{pending:status}','show_collections_pending')->name('tenant-payments');
        Route::get('payments_request/{batch_no:batch_no}','payment_request_edit')->name('tenant-payments');
        Route::get('payments_request/{batch_no:batch_no}/destroy', 'payment_request_destroy');
        Route::patch('payments_request/{batch_no:batch_no}/update', 'payment_request_update');
        Route::get('payments_request/{batch_no:batch_no}/deny','payment_request_deny');
        Route::get('payments_request/{paymentrequest}/download', 'payment_request_download');
        Route::get('concerns','show_concerns')->name('tenant-concerns');
        Route::get('concerns/create','create_concerns')->name('tenant-concerns');
        Route::get('concerns/{concern}/download', 'download_concerns');
        Route::post('concerns/store', 'store_concern');
        Route::get('concerns/{concern}', 'edit_concern')->name('tenant-concerns');
        Route::get('concerns/{concern}/success','success_concerns')->name('tenant-concerns');
    });

     Route::get('ar/{ar}/export', [TenantCollectionController::class, 'export']);
     Route::get('ar/{ar}/view', [TenantCollectionController::class, 'view']);
});

Route::get('/tenant/{uuid:uuid}/user', [TenantController::class, 'generate_credentials']);



