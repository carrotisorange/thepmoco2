<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantPortalController;
use App\Http\Controllers\TenantController;

    //Routes for dashboard
Route::prefix('{role_id:role_id}/tenant/{user}')->group(function(){
    Route::get('/', [TenantPortalController::class, 'index'])->name('tenant-dashboard');
    Route::get('contracts', [TenantPortalController::class, 'show_contracts'])->name('tenant-contracts');
    Route::get('bills', [TenantPortalController::class, 'show_bills'])->name('tenant-bills');
    Route::get('bills/export', [TenantPortalController::class, 'export_bills']);
    Route::get('payments', [TenantPortalController::class, 'show_collections'])->name('tenant-payments');
    Route::get('payments/{pending:status}', [TenantPortalController::class, 'show_collections_pending'])->name('tenant-payments');
    Route::get('payments_request/{batch_no:batch_no}', [TenantPortalController::class, 'payment_request_edit'])->name('tenant-payments');
    Route::get('payments_request/{batch_no:batch_no}/destroy', [TenantPortalController::class, 'payment_request_destroy']);
    Route::PATCH('payments_request/{batch_no:batch_no}/update', [TenantPortalController::class, 'payment_request_update']);
     Route::get('payments_request/{paymentrequest}/download', [TenantPortalController::class, 'payment_request_download']);
    Route::get('concerns', [TenantPortalController::class, 'show_concerns'])->name('tenant-concerns');
    Route::get('concerns/create', [TenantPortalController::class, 'create_concerns'])->name('tenant-concerns');
    Route::get('concerns/{concern}/download', [TenantPortalController::class, 'download_concerns']);
    Route::post('concerns/store', [TenantPortalController::class, 'store_concern']);
    Route::get('concerns/{concern}', [TenantPortalController::class, 'edit_concern'])->name('tenant-concerns');

     Route::get('ar/{ar}/export', [TenantCollectionController::class, 'export']);
     Route::get('ar/{ar}/view', [TenantCollectionController::class, 'view']);
});

Route::get('/tenant/{uuid:uuid}/user', [TenantController::class, 'generate_credentials']);



