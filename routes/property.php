<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CashflowController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\UnitContractController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TenantBillController;
use App\Http\Controllers\TenantCollectionController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TenantContractController;
use App\Http\Controllers\AcknowledgementReceiptController;
use App\Http\Controllers\ConcernController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\TimestampController;
use App\Http\Controllers\EnrolleeController;
use App\Http\Controllers\OwnerDeedOfSalesController;
use App\Http\Controllers\UnitDeedOfSalesController;
use App\Http\Controllers\UnitBillController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\TenantConcernController;
use App\Http\Controllers\TenantLedgerController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\DeedOfSaleController;
use App\Http\Controllers\PropertyBillCustomizedController;
use App\Http\Controllers\PropertyBillExpressController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\UnitEnrolleeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentRequestController;
use App\Http\Controllers\AccountPayableController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserPropertyController;
use App\Http\Controllers\OwnerBillController;
use App\Http\Controllers\OwnerCollectionController;
use App\Http\Controllers\UtilityController;

Route::group(['middleware'=>['auth', 'verified']], function(){
    Route::prefix('/property/{property}')->group(function(){

        //Routes for Property
        Route::controller(PropertyController::class)->group(function () {
            Route::get('/', 'show')->name('dashboard');
            Route::get('edit', 'edit');
            Route::patch('update','update');
            Route::get('delete', 'destroy');
        });

    Route::get('user_property/{user_property}/remove-access',[UserPropertyController::class, 'remove_access']);
    Route::get('user_property/{user_property}/restore-access',[UserPropertyController::class, 'restore_access']);
       
    //Route for contract
    Route::get('contract/{status?}',[ContractController::class, 'show_moveout_request'])->name('contract');


    //Route for notitication
    Route::get('notification',[NotificationController::class, 'index']);

   

    //Route for Building
    Route::prefix('/building')->group(function(){
        Route::post('{random_str}/store',[BuildingController::class, 'store']);
    });

    //Route for utilities
    Route::prefix('utilities')->group(function(){
        Route::get('/',[UtilityController::class, 'index'])->name('utilities');
    });


    //Routes for Unit
    Route::prefix('unit')->group(function(){
        Route::get('/', [UnitController::class, 'index'])->name('unit');
        
            Route::post('{batch_no:batch_no}/store', [UnitController::class, 'store']);
            Route::get('{batch_no?}/edit', [UnitController::class, 'bulk_edit']);
            Route::get('{batch_no}/create', [UnitController::class, 'create']);
            //Route::patch('{batch_no}/update', [UnitController::class, 'bulk_update']);

        Route::prefix('{unit}')->group(function(){
            Route::get('delete', [UnitController::class, 'destroy']);
            Route::get('/', [UnitController::class, 'show'])->name('unit')->scopeBindings();
            Route::get('enrollee', [UnitEnrolleeController::class, 'index']);
            Route::patch('update', [UnitController::class, 'update']);
            Route::get('contracts', [UnitContractController::class, 'index']);

            Route::prefix('tenant')->group(function(){
                Route::get('{random_str}/create', [UnitContractController::class, 'create'])->name('unit');
                Route::get('{random_str}/create/export', [UnitContractController::class, 'export']);
                Route::get('{tenant}/contract/{random_str}/create',[ContractController::class,'create']);
                
            });

            Route::prefix('guest')->group(function(){
                Route::get('{random_str}/create', [GuestController::class, 'create']);
                Route::post('store', [GuestController::class, 'store']);
            });
                
            Route::prefix('owner')->group(function(){
                Route::get('/', [OwnerController::class, 'index'])->scopeBindings();
                Route::get('{random_str}/create', [OwnerController::class, 'create'])->name('unit');
                Route::get('{owner}/delete', [OwnerController::class, 'destroy']);
                Route::get('{owner}/bills', [OwnerBillController::class, 'index'])->name('owner');
                Route::post('{random_str}/store', [OwnerController::class, 'store']);


                Route::prefix('{owner}')->group(function(){
        
                    Route::prefix('deed_of_sale')->group(function(){
                        Route::get('create',[DeedOfSaleController::class,'create']);
                        Route::get('{deed_of_sale}/delete', [DeedOfSaleController::class, 'destroy']);
                        Route::get('{deed_of_sale}/backout', [DeedOfSaleController::class, 'backout'])->name('owner');
                        Route::get('{deed_of_sale}/edit', [DeedOfSaleController::class, 'edit'])->name('owner');
                        Route::post('{random_str}/store', [DeedOfSaleController::class,'store']);
                    });

                    Route::prefix('bank')->group(function(){
                        Route::get('create', [BankController::class, 'create']);
                    });

                    Route::prefix('occupancy')->group(function(){
                        Route::get('create', [UnitController::class, 'update_unit_occupancy_info']);
                    });

                    Route::prefix('representative')->group(function(){
                        Route::get('create', [RepresentativeController::class, 'create']);
                    });

                });
       
            });
            
            Route::get('deed_of_sales', [UnitDeedOfSalesController::class, 'index']);
            
            
            Route::get('bills', [UnitBillController::class, 'index'])->name('unit');
        });
    });

    //Routes for Tenant
    Route::prefix('/tenant')->group(function(){
        Route::get('/', [TenantController::class, 'index'])->name('tenant');
        Route::get('/unlock', [TenantController::class, 'unlock'])->name('tenant');
        Route::get('{tenant:uuid}', [TenantController::class, 'show'])->name('tenant');
    
        Route::prefix('{tenant}')->group(function(){
            Route::get('bills', [TenantBillController::class, 'index'])->name('tenant');
            Route::get('bills/{batch_no}/pay', [TenantCollectionController::class, 'edit'])->name('tenant');
            Route::patch('bills/{batch_no}/pay/update', [TenantCollectionController::class, 'update']);
            Route::get('collections', [TenantCollectionController::class,'index'])->name('tenant');
            Route::get('payment_requests/{payment_request}',[PaymentRequestController::class, 'show'])->name('tenant');
            Route::get('collection/{batch_no?}', [TenantCollectionController::class,'destroy']);
            Route::get('contracts', [TenantContractController::class,'index']);
            Route::get('delete', [TenantController::class, 'destroy']);
            Route::post('bill/store', [TenantBillController::class, 'store']);
            Route::get('bill/export', [TenantBillController::class, 'export']);
            Route::get('bill/send', [TenantBillController::class, 'send']);
            //Route::get('collection/store', [TenantCollectionController::class, 'store']);
            Route::get('ar/{ar}/export', [TenantCollectionController::class, 'export']);
            Route::get('ar/{ar}/view', [TenantCollectionController::class, 'view']);
            Route::get('ar/{ar}/attachment', [TenantCollectionController::class, 'attachment']);
            Route::get('concerns', [TenantConcernController::class, 'index']);
            Route::get('units', [TenantContractController::class, 'create']);
            Route::get('ledger', [TenantLedgerController::class, 'index']);

            Route::prefix('guardian')->group(function(){
                Route::get('{unit?}/create', [GuardianController::class, 'create']);
                Route::delete('{guardian_id:id}', [GuardianController::class, 'destroy']);
            });

            Route::prefix('bill')->group(function(){
                Route::get('{unit?}/create', [BillController::class, 'create_new']);
            });

            Route::prefix('reference')->group(function(){
                Route::get('{unit?}/create', [ReferenceController::class, 'create']);
                Route::delete('{reference_id:id}', [ReferenceController::class, 'destroy']);
            });
        
            Route::prefix('/contract')->group(function(){
                Route::prefix('{contract}')->group(function(){
                    Route::get('renew', [ContractController::class, 'renew'])->name('tenant');
                    Route::get('edit', [ContractController::class, 'edit'])->name('tenant');
                    Route::get('moveout', [ContractController::class, 'moveout'])->name('tenant');
                    Route::get('export', [ContractController::class, 'export']);
                    Route::get('transfer', [ContractController::class, 'transfer'])->name('tenant');
                    Route::get('movein', [ContractController::class, 'movein'])->name('tenant');
                  
                });
            });  
        });
});
    
    //Routes for Owner
    Route::prefix('owner')->group(function(){
        Route::get('/', [OwnerController::class, 'index'])->name('owner');
        Route::get('/unlock', [OwnerController::class, 'unlock'])->name('owner');

        Route::prefix('{owner}')->group(function(){
            Route::prefix('representative')->group(function(){
                Route::get('create', [RepresentativeController::class, 'create']);
            });

            Route::prefix('bank')->group(function(){
                Route::get('create', [BankController::class, 'create'])->name('owner');
            });        
            
            Route::get('/', [OwnerController::class, 'show'])->name('owner');
           
            Route::get('unit', [OwnerDeedOfSalesController::class, 'create']);

            Route::get('deed_of_sales', [OwnerDeedOfSalesController::class, 'index']);
            Route::get('enrollees', [OwnerEnrolleeController::class, 'index']);
            Route::get('bills', [OwnerBillController::class, 'index'])->name('owner');
            Route::post('bill/store', [OwnerBillController::class, 'store']);
            Route::get('bill/export', [OwnerBillController::class, 'export']);
            Route::get('bill/send', [OwnerBillController::class, 'send']);
            Route::get('collections', [OwnerCollectionController::class, 'index'])->name('owner');
            Route::get('ar/{ar}/export', [OwnerCollectionController::class, 'export']);
            Route::get('ar/{ar}/view', [OwnerCollectionController::class, 'view']);
            Route::get('ar/{ar}/attachment', [OwnerCollectionController::class, 'attachment']);
            Route::get('edit', [OwnerController::class, 'edit']);

            Route::get('bills/{batch_no}/pay', [OwnerCollectionController::class, 'edit']);
            Route::patch('bills/{batch_no}/pay/update', [OwnerCollectionController::class, 'update']);
        });      
    });

  
    //Routes for Bill
    Route::prefix('bill')->group(function(){
        Route::get('{batch_no?}/{drafts?}', [BillController::class, 'index'])->name('bill');
        //Route::get('drafts', [BillController::class, 'draft'])->name('bill');
        
        Route::prefix('{bill}')->group(function(){
            Route::delete('delete', [BillController::class, 'destroy']);
        });

        Route::post('express/{bill_count}/store',[ PropertyBillExpressController::class, 'store']);
        Route::post('customized/{bill_count}/store',[PropertyBillCustomizedController::class,'store']);
        Route::get('customized/{batch_no}/edit',[PropertyBillCustomizedController::class,'edit'])->name('bill');
        Route::patch('customized/batch/{batch_no}',[PropertyBillCustomizedController::class,'update']);
      
    });

    //Routes for Cashflow
    Route::prefix('cashflow')->group(function(){
        Route::get('/', [CashflowController::class, 'index'])->name('cashflow');
    });


    //Routes for Collection
    Route::prefix('collection')->group(function(){
        Route::get('/', [AcknowledgementReceiptController::class, 'index'])->name('collection');
        Route::get('/{status}', [PaymentRequestController::class, 'index'])->name('collection');

    });

    //Routes for Account Payable
    Route::prefix('accountpayable')->group(function(){
        Route::controller(AccountPayableController::class)->group(function () {
         Route::get('{status:status?}', 'index')->name('accountpayable');
         Route::get('{id}/attachment',  'download');
         Route::get('{id}/approve', 'approve');
         Route::get('{str_random}/create', 'create')->name('accountpayable');
        });
    });

    //Routes for Concern
    Route::prefix('concern')->group(function(){
        Route::get('/', [ConcernController::class, 'index'])->name('concern');
        Route::get('create', [ConcernController::class, 'create'])->name('concern');
        Route::get('/{concern}', [ConcernController::class, 'show'])->name('concern');
    });

    //Routes for Team
    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('{random_str}/create', [UserController::class, 'create'])->name('user');


        Route::prefix('{user}')->group(function(){
            Route::get('/property/{property_uuid:uuid}/delegate', [UserController::class, 'delegate']);
        });
    });

    //Routes for Referral
    Route::prefix('referral')->group(function(){
        Route::get('/', [ReferralController::class, 'index'])->name('referral');
    });
   
    //Routes for Timestamp
    Route::prefix('timestamp')->group(function(){
        Route::get('/', [TimestampController::class, 'index'])->name('timestamp');
    });

    //Routes for Enrollee
    Route::prefix('enrollees')->group(function(){
        Route::get('/', [EnrolleeController::class, 'index'])->name('enrollees');
    });    

    //show contracts
    Route::get('/tenant_contract', [PropertyController::class, 'show_tenant_contract']);

    Route::get('/owner_contract', [PropertyController::class, 'show_owner_contract']);

    Route::get('roles', [PropertyRoleController::class, 'index']);
    });
});
