<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalTenantController;
use App\Http\Controllers\TenantController;

    //Routes for dashboard
Route::prefix('{role_id:role_id}/tenant/{user}')->group(function(){
    Route::get('/', [PortalTenantController::class, 'index'])->name('tenant-dashboard');
    Route::get('contracts', [PortalTenantController::class, 'show_contracts'])->name('tenant-contracts');
    Route::get('bills', [PortalTenantController::class, 'show_bills'])->name('tenant-bills');
    Route::get('bills/export', [PortalTenantController::class, 'export_bills']);
    Route::get('payments', [PortalTenantController::class, 'show_collections'])->name('tenant-payments');
    Route::get('payments/{pending:status}', [PortalTenantController::class, 'show_collections_pending'])->name('tenant-payments');
    Route::get('payments_request/{batch_no:batch_no}', [PortalTenantController::class, 'payment_request_edit'])->name('tenant-payments');
    Route::get('payments_request/{batch_no:batch_no}/destroy', [PortalTenantController::class, 'payment_request_destroy']);
    Route::PATCH('payments_request/{batch_no:batch_no}/update', [PortalTenantController::class, 'payment_request_update']);
    Route::get('payments_request/{batch_no:batch_no}/deny', [PortalTenantController::class, 'payment_request_deny']);
    Route::get('payments_request/{paymentrequest}/download', [PortalTenantController::class, 'payment_request_download']);
    Route::get('concerns', [PortalTenantController::class, 'show_concerns'])->name('tenant-concerns');
    Route::get('concerns/create', [PortalTenantController::class, 'create_concerns'])->name('tenant-concerns');
    Route::get('concerns/{concern}/download', [PortalTenantController::class, 'download_concerns']);
    Route::post('concerns/store', [PortalTenantController::class, 'store_concern']);
    Route::get('concerns/{concern}', [PortalTenantController::class, 'edit_concern'])->name('tenant-concerns');
    Route::get('concerns/{concern}/success', [PortalTenantController::class, 'success_concerns'])->name('tenant-concerns');

     Route::get('ar/{ar}/export', [TenantCollectionController::class, 'export']);
     Route::get('ar/{ar}/view', [TenantCollectionController::class, 'view']);
});

Route::get('/tenant/{uuid:uuid}/user', [TenantController::class, 'generate_credentials']);



