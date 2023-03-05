<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\UnitContractController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\TenantBillController;
use App\Http\Controllers\TenantCollectionController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TenantContractController;
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
use App\Http\Controllers\UserPropertyController;
use App\Http\Controllers\OwnerBillController;
use App\Http\Controllers\OwnerCollectionController;
use App\Http\Controllers\PropertyContractController;
use App\Http\Controllers\PropertyDashboardController;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\UnitEditBulkController;
use App\Http\Controllers\UnitConcernController;
use App\Http\Controllers\UnitInventoryController;
use App\Http\Controllers\TenantGuardianController;
use App\Http\Controllers\TenantReferenceController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TenantWalletController;
use App\Http\Controllers\PropertyOwnerController;
use App\Http\Controllers\PropertyPersonnelController;
use App\Http\Controllers\PropertyUnitController;
use App\Http\Controllers\PropertyTenantController;
use App\Http\Controllers\PropertyConcernController;
use App\Http\Controllers\PropertyBillController;
use App\Http\Controllers\PropertyCollectionController;
use App\Http\Controllers\PropertyAccountPayableController;
use App\Http\Controllers\PropertyCalendarController;
use App\Http\Controllers\PropertyFinancialController;
use App\Http\Controllers\PropertyUtilityController;
use App\Http\Controllers\PropertyGuestController;


Route::group(['middleware'=>['auth', 'verified']], function(){

    Route::post('calendar', [PropertyCalendarController::class, 'store'])->name('calendar.store');

    Route::post('calendar', [PropertyCalendarController::class, 'store'])->name('calendar.store');
    Route::patch('calendar/update/{id}', [PropertyCalendarController::class, 'update'])->name('calendar.update');
    Route::delete('calendar/destroy/{id}', [PropertyCalendarController::class, 'destroy'])->name('calendar.destroy');

    Route::prefix('/property/{property}')->group(function(){

    //Routes for Property
    Route::controller(PropertyController::class)->group(function () {
        Route::get('edit', 'edit');
        Route::patch('update','update');
        Route::get('delete', 'destroy');
    });

    Route::get('/', [PropertyDashboardController::class, 'index'])->name('dashboard');

    Route::get('user_property/{user_property}/remove-access',[UserPropertyController::class, 'remove_access']);
    Route::get('user_property/{user_property}/restore-access',[UserPropertyController::class, 'restore_access']);
       
    //Route for contract
    Route::get('contract/{status}',[ContractController::class, 'show_moveout_request'])->name('contract');
    Route::get('contract', [PropertyContractController::class, 'index'])->name('contract');


    //Route for Building
    Route::prefix('/building')->group(function(){
        Route::post('{random_str}/store',[BuildingController::class, 'store']);
    });

    //Route for utilities
    Route::prefix('utilities')->group(function(){
        Route::get('/',[PropertyUtilityController::class, 'index'])->name('utilities');
        Route::get('/{batch_no}/{option}',[UtilityController::class, 'edit'])->name('utilities');
        
    });

    //route for adding bill to unit based on the utility reading
    Route::get('unit/{unit}/{type}/utility/{utility}', [UnitBillController::class, 'create'])->name('unit');
    Route::get('unit/{unit}/utility/{utility}/edit', [UnitBillController::class, 'edit'])->name('unit');
    
    Route::get('unit/{unit}/{type}/utility/{utility}/success', [UnitBillController::class, 'success'])->name('unit');

    Route::prefix('guest')->group(function(){
        Route::get('/', [PropertyGuestController::class, 'index'])->name('guest');
    });

    Route::get('/unit/{unit}/guest/{guest}/movein', [PropertyGuestController::class, 'movein']);


    Route::get('/unit/{unit}/guest/{guest}/moveout', [PropertyGuestController::class, 'moveout']);


    //Routes for calendar
    Route::get('calendar', [PropertyCalendarController::class, 'index'])->name('calendar');

    //Routes for Unit
    Route::prefix('unit')->group(function(){
        Route::get('/', [PropertyUnitController::class, 'index'])->name('unit');
        
            Route::post('{batch_no:batch_no}/store', [UnitController::class, 'store']);
            Route::get('{batch_no?}/edit', [UnitEditBulkController::class, 'edit'])->name('unit');
            Route::get('{batch_no}/create', [UnitController::class, 'create']);
            //Route::patch('{batch_no}/update', [UnitController::class, 'bulk_update']);

        Route::prefix('{unit:uuid}')->group(function(){
            Route::get('/contract/{contract}/inventory/export', [UnitInventoryController::class, 'export_movein']);
            Route::get('delete', [UnitController::class, 'destroy']);
            Route::get('/', [PropertyUnitController::class, 'show'])->name('unit')->scopeBindings();
            Route::get('enrollee', [UnitEnrolleeController::class, 'index']);
            Route::patch('update', [UnitController::class, 'update']);
            Route::get('contracts', [UnitContractController::class, 'index']);
            Route::get('concern/{random_str}/create', [UnitConcernController::class, 'create'])->name('unit');
            Route::get('concern/{concern}/edit', [UnitConcernController::class, 'edit'])->name('unit');
            Route::get('concerns', [UnitConcernController::class, 'index'])->name('unit');

            Route::prefix('tenant')->group(function(){
                Route::get('{random_str}/create', [UnitContractController::class, 'create'])->name('unit');
                Route::get('{random_str}/create/export', [UnitContractController::class, 'export']);
                Route::get('{tenant}/contract/{random_str}/create',[ContractController::class,'create']);
                
            });

            Route::prefix('guest')->group(function(){
                
                Route::get('{random_str}/create', [GuestController::class, 'create'])->name('guest');
                Route::post('store', [GuestController::class, 'store']);
            });

            Route::prefix('inventory')->group(function(){
                Route::get('{random_str}/create', [UnitInventoryController::class, 'create'])->name('unit');
                Route::get('export', [UnitInventoryController::class, 'export'])->name('unit');
          
            });

            Route::get('/tenant/{tenant}/contract/{contract}/inventory/create', [UnitInventoryController::class, 'movein_create'])->name('unit');
                
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

    //Routes for guardians
    Route::get('/tenant/{tenant}/guardian/{random_str}/create', [TenantGuardianController::class, 'create']);

    Route::get('/unit/{unit}/tenant/{tenant}/guardian/{random_str}/create', [GuardianController::class, 'create']);

    //Routes for references
    Route::get('/tenant/{tenant}/reference/{random_str}/create', [TenantReferenceController::class, 'create']);

    Route::get('/unit/{unit}/tenant/{tenant}/reference/{random_str}/create', [ReferenceController::class, 'create']);

    //Routes for wallets
    Route::get('/unit/{unit}/tenant/{tenant}/contract/{contract}/deposit/{random_str}/create', [WalletController::class, 'create']);
    Route::get('/tenant/{tenant}/wallet/{random_str}/create', [TenantWalletController::class, 'create']);

    //Routes for bills
    Route::get('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/create', [BillController::class, 'create_new']);

    //Routes for contract
    Route::get('/unit/{unit}/tenant/{tenant}/contract/{contract}/movein/{random_str}/create', [ContractController::class, 'movein']);
    Route::get('/unit/{unit}/tenant/{tenant}/contract/{contract}', [PropertyContractController::class, 'show'])->name('contract');

    //force moveout
    Route::post('/contract/{contract}/moveout/force', [ContractController::class, 'force_moveout']);


    //Routes for Tenant
    Route::prefix('/tenant')->group(function(){
        Route::get('/', [PropertyTenantController::class, 'index'])->name('tenant');
        Route::get('/unlock', [TenantController::class, 'unlock'])->name('tenant');
        Route::get('{tenant:uuid}', [TenantController::class, 'show'])->name('tenant');

      
    
        Route::prefix('{tenant}')->group(function(){
            Route::get('bills', [TenantBillController::class, 'index'])->name('tenant-bill');
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
            Route::get('ar/{ar}/proof_of_payment', [TenantCollectionController::class, 'proof_of_payment']);
            Route::get('concerns', [TenantConcernController::class, 'index'])->name('tenant');
            Route::get('concern/create', [TenantConcernController::class, 'create'])->name('concern');
            Route::get('concern/{concern}/edit', [TenantConcernController::class, 'edit'])->name('tenant');
            Route::get('units', [TenantContractController::class, 'create']);
            Route::get('ledger', [TenantLedgerController::class, 'index']);

            Route::prefix('concern')->group(function(){
                Route::post('store', [ConcernController::class, 'store']);
            });


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

                    Route::get('moveout/step-1', [ContractController::class, 'moveout_step_1'])->name('tenant');
                    Route::get('moveout/step-2', [ContractController::class, 'moveout_step_2'])->name('tenant');
                    Route::get('moveout/step-3', [ContractController::class, 'moveout_step_3'])->name('tenant');
                    Route::get('moveout/step-3/export', [ContractController::class, 'export_clearance_form'])->name('tenant');
                    Route::get('moveout/step-4', [ContractController::class, 'moveout_step_4'])->name('tenant');
                    Route::get('moveout/step-5', [ContractController::class, 'moveout_step_5'])->name('tenant');


                    Route::get('export', [ContractController::class, 'export']);
                    Route::get('transfer', [ContractController::class, 'transfer'])->name('tenant');
                    Route::get('movein', [ContractController::class, 'movein'])->name('tenant');
                    Route::get('moveout/export', [ContractController::class, 'export_moveout_form']);
                    Route::get('delete', [ContractController::class, 'destroy']);
                  
                });
            });  
        });
});
    
    //Routes for Owner
    Route::prefix('owner')->group(function(){
        Route::get('/', [PropertyOwnerController::class, 'index'])->name('owner');
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
            Route::get('collection/{batch_no?}', [OwnerCollectionController::class,'destroy']);
            Route::post('bill/store', [OwnerBillController::class, 'store']);
            Route::get('bill/export', [OwnerBillController::class, 'export']);
            Route::get('bill/send', [OwnerBillController::class, 'send']);
            Route::get('collections', [OwnerCollectionController::class, 'index'])->name('owner');
            Route::get('ar/{ar}/export', [OwnerCollectionController::class, 'export']);
            Route::get('ar/{ar}/view', [OwnerCollectionController::class, 'view']);
            Route::get('ar/{ar}/attachment', [OwnerCollectionController::class, 'attachment']);
            Route::get('ar/{ar}/proof_of_payment', [OwnerCollectionController::class, 'proof_of_payment']);
            Route::get('edit', [OwnerController::class, 'edit']);

            Route::get('bills/{batch_no}/pay', [OwnerCollectionController::class, 'edit']);
            Route::patch('bills/{batch_no}/pay/update', [OwnerCollectionController::class, 'update']);
        });      
    });

  
    //Routes for Bill
    Route::prefix('bill')->group(function(){
        Route::get('{batch_no?}/{drafts?}', [PropertyBillController::class, 'index'])->name('bill');
        Route::get('export/status/{status?}/particular/{particular?}/date/{date?}', [PropertyBillController::class, 'export']);

        Route::get('/batch/{batch_no}/drafts', [BillController::class, 'drafts'])->name('bill');
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
    Route::prefix('financial')->group(function(){
        Route::get('/', [PropertyFinancialController::class, 'index'])->name('financial');
        Route::get('{type}/export/{filter}', [PropertyFinancialController::class, 'export']);
    });


    //Routes for Collection
    Route::prefix('collection')->group(function(){
        Route::get('/', [PropertyCollectionController::class, 'index'])->name('collection');
        Route::get('/{status}', [PaymentRequestController::class, 'index'])->name('collection');

    });

    //Routes for Account Payable
    Route::prefix('accountpayable')->group(function(){
        Route::get('/', [PropertyAccountPayableController::class, 'index'])->name('accountpayable');
        Route::get('export/{status?}/{created_at?}/{request_for?}/{limitDisplayTo?}', [PropertyAccountPayableController::class, 'export']);

        Route::get('{accountPayable}', [PropertyAccountPayableController::class, 'show'])->name('accountpayable');
        Route::get('{accountPayable}/download', [PropertyAccountPayableController::class, 'download']);

        Route::controller(AccountPayableController::class)->group(function () {
    
            Route::get('{accountPayable}', 'show')->name('accountpayable');
            Route::get('{id}/attachment',  'download');

            // Route::get('{accountPayable}/export/step-1', [AccountPayableController::class, 'export_step1']);

            Route::get('{id}/approve', 'approve');
            //Route::get('{str_random}/create', 'create')->name('accountpayable');

            //step 1
            Route::get('{accountpayable}/step-1', 'create_step_1')->name('accountpayable');
            Route::get('{accountpayable}/step1/export', 'download_step_1');

            //step 2
            Route::get('{accountpayable}/step-2', 'create_step_2')->name('accountpayable');

            //step 3
            Route::get('{accountpayable}/step-3', 'create_step_3')->name('accountpayable');
    

            //step 4
            Route::get('{accountpayable}/step-4', 'create_step_4')->name('accountpayable');

            //step 5
            Route::get('{accountpayable}/step-5', 'create_step_5')->name('accountpayable');


            //step 6
            Route::get('{accountpayable}/step-6', 'create_step_6')->name('accountpayable');
   

            //request status sample
            Route::get('{random_str}/request-status', 'create_request_status')->name('accountpayable');
            Route::post('request-status', 'store_request_status');

            //comment page
            Route::get('{random_str}/request-comment', 'create_request_comment')->name('accountpayable');
            Route::post('request-comment', 'store_request_comment');

            //pdf 

            Route::get('{random_str}/step1', 'create_step1')->name('accountpayable');
            Route::post('step1', 'store_step1');

            Route::get('{random_str}/step2', 'create_step2')->name('accountpayable');
            Route::post('step2', 'store_step2');

            Route::get('{random_str}/step3', 'create_step3')->name('accountpayable');
            Route::post('step3', 'store_step3');

            Route::get('{random_str}/step4', 'create_step4')->name('accountpayable');
            Route::post('step4', 'store_step4');

            Route::get('{random_str}/step5', 'create_step5')->name('accountpayable');
            Route::post('step5', 'store_step5');

            Route::get('{random_str}/step6', 'create_step6')->name('accountpayable');
            Route::post('step6', 'store_step6');            

            
        });
        

    });

    //Routes for Concern
    Route::prefix('concern')->group(function(){
        Route::get('/', [PropertyConcernController::class, 'index'])->name('concern');
        Route::get('create', [ConcernController::class, 'create'])->name('concern');
    });

    //Routes for Team
    Route::prefix('user')->group(function(){
        Route::get('/', [PropertyPersonnelController::class, 'index'])->name('user');
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

    // owner portal - unit detail
    Route::get('/unitdetail', function(){
        return view('portals.owners.unitdetail');
    });

    // calendar
    Route::get('/unit-calendar', function(){
        return view('calendar.unit-calendar');
    });

    Route::get('/master-calendar', function(){
        return view('calendar.master-calendar');
    });

    Route::get('/guest-creation', function(){
        return view('calendar.guest-creation');
    });

    
});
