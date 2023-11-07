<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantContractController;
use App\Http\Controllers\TenantConcernController;
use App\Http\Controllers\TenantLedgerController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\BillController;

    Route::prefix('/tenant')->group(function(){
        Route::controller(TenantController::class)->group(function() {
            Route::get('/','index')->name('tenant');
            Route::get('/unlock', 'unlock')->name('tenant');
            Route::get('{tenant:uuid}', 'show')->name('tenant');
            Route::get('{uuid:uuid}/user','generate_credentials');
        });

        Route::prefix('{tenant}')->group(function(){
            Route::get('reference/{random_str}/create', [TenantReferenceController::class, 'create']);
            Route::get('guardian/{random_str}/create', [TenantGuardianController::class, 'create']);
            Route::get('wallet/{random_str}/create', [TenantWalletController::class, 'create']);

            Route::controller(CollectionController::class)->group(function() {
                Route::get('bills/{batch_no}/pay', 'edit_collections')->name('tenant');
                Route::patch('bills/{batch_no}/pay/update','update_collections');
                Route::get('collections','tenant_collection_index')->name('tenant');
                Route::get('payment_requests/{payment_request}', 'show_payment_request')->name('tenant');
                Route::get('collection/{collection}/view','export_ar');
            });

            Route::get('contracts', [TenantContractController::class,'index']);
            Route::get('concerns', [TenantConcernController::class, 'index'])->name('tenant');
            Route::get('concern/create', [TenantConcernController::class, 'create'])->name('concern');
            Route::get('units', [TenantContractController::class, 'create']);
            Route::get('ledger', [TenantLedgerController::class, 'index']);

            Route::controller(BillController::class)->group(function() {
                Route::get('bills', 'tenant_index')->name('tenant');
                Route::get('bill/export', 'export_soa');
                Route::get('bill/send', 'send_bills');
            });

            Route::prefix('concern')->group(function(){
                Route::post('store', [ConcernController::class, 'store']);
            });
            Route::prefix('guardian')->group(function(){
                Route::controller(GuardianController::class)->group(function(){
                    Route::get('{unit?}/create', 'create');
                    Route::delete('{guardian_id:id}', 'destroy');
                });
            });
            Route::prefix('bill')->group(function(){
                Route::get('{unit?}/create', [BillController::class, 'create_new']);
            });
            Route::prefix('reference')->group(function(){
                Route::controller(ReferenceController::class)->group(function(){
                    Route::get('{unit?}/create', 'create');
                    Route::delete('{reference_id:id}', 'destroy');
                });
            });
            Route::prefix('/contract/{contract}')->group(function(){
               Route::controller(ContractController::class)->group(function(){
                    Route::get('renew', 'renew')->name('tenant');
                    Route::get('edit','edit')->name('tenant');
                    Route::get('moveout/step-1', 'moveout_step_1')->name('tenant');
                    Route::get('moveout/step-2', 'moveout_step_2')->name('tenant');
                    Route::get('moveout/step-3',  'moveout_step_3')->name('tenant');
                    Route::get('moveout/step-3/export','export_clearance_form')->name('tenant');
                    Route::get('moveout/step-4','moveout_step_4')->name('tenant');
                    Route::get('moveout/step-5',  'moveout_step_5')->name('tenant');
                    Route::get('export', 'export');
                    Route::get('transfer', 'transfer')->name('tenant');
                    Route::get('movein', 'movein')->name('tenant');
                    Route::get('moveout/export', 'export_moveout_form');
                    Route::get('delete','destroy');
               });
            });
        });
    });
