<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitContractController;
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
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\UnitEnrolleeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestForPurchaseController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserPropertyController;
use App\Http\Controllers\OwnerBillController;
use App\Http\Controllers\OwnerCollectionController;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\UnitConcernController;
use App\Http\Controllers\UnitInventoryController;
use App\Http\Controllers\TenantGuardianController;
use App\Http\Controllers\TenantReferenceController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TenantWalletController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\AccountPayableController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\PropertyUtilityController;
use App\Http\Controllers\PropertyGuestController;
use App\Http\Controllers\LiquidationController;
use App\Http\Controllers\RemittanceController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\HouseOwnerController;

Route::group(['middleware'=>['auth', 'verified']], function(){

    Route::put('/booking/{booking}/update', [BookingController::class, 'update']);

    Route::post('calendar', [CalendarController::class, 'store'])->name('calendar.store');

    Route::post('calendar/store', [CalendarController::class, 'store'])->name('calendar.store');
    Route::patch('calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
    Route::delete('calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');
    Route::get('calendar/show/{id}', [CalendarController::class, 'show'])->name('calendar.show');

    Route::prefix('/property/{property}')->group(function(){

    //property remittances
    //remittance
    Route::get('/unit/{unit}/remittances', [RemittanceController::class, 'show']);

    Route::prefix('remittance')->group(function(){
        Route::get('/', [RemittanceController::class, 'index'])->name('remittance');

    });

    //Routes for Property
    Route::controller(PropertyController::class)->group(function () {
        Route::get('edit', 'edit');
        Route::get('edit-documents', 'edit_documents');
        Route::patch('update','update');
        Route::get('delete', 'destroy');
    });

    Route::get('/', [PropertyController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [PropertyController::class, 'show'])->name('dashboard');

    Route::get('user_property/{user_property}/remove-access',[UserPropertyController::class, 'remove_access']);
    Route::get('user_property/{user_property}/restore-access',[UserPropertyController::class, 'restore_access']);

    //Route for contract
    Route::get('contract/{status}',[ContractController::class, 'show_moveout_request'])->name('contract');
    Route::get('contract', [ContractController::class, 'index'])->name('contract');


    //Route for Building
    Route::prefix('/building')->group(function(){
        Route::post('{random_str}/store',[BuildingController::class, 'store']);
    });

    //Routes for Bulletin
    Route::prefix('election')->group(function(){
        Route::get('/',[ElectionController::class, 'index'])->name('election');
        Route::get('/create', [ElectionController::class, 'create'])->name('election');
        Route::get('/{election}/create/step-1', [ElectionController::class, 'edit_step_1'])->name('election');
        Route::get('/{election}/create/step-2', [ElectionController::class, 'create_step_2'])->name('election');
        Route::get('/{election}/export/step-2', [ElectionController::class, 'export_step_2'])->name('election');
        Route::get('/{election}/create/step-3', [ElectionController::class, 'create_step_3'])->name('election');
        Route::get('/{election}/export/step-3', [ElectionController::class, 'export_step_3'])->name('election');
        Route::get('/{election}/create/step-4', [ElectionController::class, 'create_step_4'])->name('election');
        Route::get('/{election}/create/step-5', [ElectionController::class, 'create_step_5'])->name('election');
    });

    //Route for utilities
    Route::prefix('utility')->group(function(){
        Route::get('/',[PropertyUtilityController::class, 'index'])->name('utility');
        Route::get('/{batch_no}/{option}',[UtilityController::class, 'edit'])->name('utility');

    });

    //route for adding bill to unit based on the utility reading
    Route::get('unit/{unit}/{type}/utility/{utility}', [UnitBillController::class, 'create'])->name('unit');
    Route::get('unit/{unit}/utility/{utility}/edit', [UnitBillController::class, 'edit'])->name('unit');

    Route::get('unit/{unit}/{type}/utility/{utility}/success', [UnitBillController::class, 'success'])->name('unit');

    Route::prefix('guest')->group(function(){
        Route::get('/', [PropertyGuestController::class, 'index'])->name('guest');
        Route::get('{guest}', [PropertyGuestController::class, 'show'])->name('guest');
        Route::get('{guest:uuid}/bills', [PropertyGuestController::class, 'show_bills']);
        Route::get('{guest:uuid}/booking/{booking:uuid}/edit', [PropertyGuestController::class, 'edit']);
        Route::get('{guest:uuid}/bills/{batch_no}/pay', [PropertyGuestController::class, 'store_collections']);
        Route::patch('{guest:uuid}/bills/{batch_no}/pay/update', [PropertyGuestController::class, 'update_collections']);
        Route::get('{guest:uuid}/collection/{collection}/view', [PropertyGuestController::class, 'show_collections']);
        Route::get('{guest:uuid}/collection/{collection}/attachment', [PropertyGuestController::class, 'view_attachment']);
        Route::get('{guest:uuid}/export', [PropertyGuestController::class, 'export']);
        Route::get('{guest:uuid}/bill/export', [PropertyGuestController::class, 'export_bill']);
    });

    Route::get('/unit/{unit}/guest/{guest}/movein', [PropertyGuestController::class, 'movein']);


    Route::get('/unit/{unit}/guest/{guest}/moveout', [PropertyGuestController::class, 'moveout']);


    //Routes for calendar
    Route::get('calendar', [CalendarController::class, 'index'])->name('calendar');

    Route::prefix('house-owner')->group(function(){
        Route::get('/', [HouseOwnerController::class, 'index'])->name('house-owner');
        Route::get('{house_owner}', [HouseOwnerController::class, 'show'])->name('house-owner');
    });

    Route::get('/bulletin', [BulletinController::class, 'index'])->name('bulletin');

    Route::prefix('house')->group(function(){
        Route::get('/', [HouseController::class, 'index'])->name('house');
        Route::get('{batch_no?}/edit', [HouseController::class, 'edit'])->name('house');
        Route::get('{house}', [HouseController::class, 'show'])->name('house');

        Route::get('/{house}/house-owner/create', [HouseOwnerController::class, 'create'])->name('house');
    });


    //Routes for Unitf
    Route::prefix('unit')->group(function(){
        Route::get('/', [UnitController::class, 'index'])->name('unit');
        Route::get('{batch_no?}/edit', [UnitController::class, 'edit'])->name('unit');
        Route::get('{unit:uuid}', [UnitController::class, 'show'])->name('unit')->scopeBindings();

        Route::prefix('{unit:uuid}')->group(function(){
            Route::get('/contract/{contract}/inventory/export', [UnitInventoryController::class, 'export_movein']);
            Route::get('enrollee', [UnitEnrolleeController::class, 'index']);
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
                Route::get('{unit_inventory}', [UnitInventoryController::class, 'upload_image'])->name('unit');
                Route::get('{random_str}/export', [UnitInventoryController::class, 'export'])->name('unit');

            });

            Route::get('/tenant/{tenant}/contract/{contract}/inventory/create', [UnitInventoryController::class, 'movein_create'])->name('unit');

            Route::prefix('owner')->group(function(){
                Route::get('/', [OwnerController::class, 'index'])->scopeBindings();
                Route::get('{random_str}/create', [OwnerController::class, 'create'])->name('unit');
                Route::get('{owner}/delete', [OwnerController::class, 'destroy']);
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
    Route::get('/unit/{unit}/tenant/{tenant}/contract/{contract}', [ContractController::class, 'show'])->name('contract');

    //force moveout
    Route::post('/contract/{contract}/moveout/force', [ContractController::class, 'force_moveout']);


    //Routes for Tenant
    Route::prefix('/tenant')->group(function(){
        Route::get('/', [TenantController::class, 'index'])->name('tenant');
        Route::get('/unlock', [TenantController::class, 'unlock'])->name('tenant');
        Route::get('{tenant:uuid}', [TenantController::class, 'show'])->name('tenant');

        Route::prefix('{tenant}')->group(function(){
            Route::get('bills', [BillController::class, 'tenant_index'])->name('tenant-bill');
            Route::get('bills/{batch_no}/pay', [CollectionController::class, 'edit_collections'])->name('tenant');
            Route::patch('bills/{batch_no}/pay/update', [CollectionController::class, 'update_collections']);
            Route::get('collections', [CollectionController::class,'tenant_collection_index'])->name('tenant');
            Route::get('payment_requests/{payment_request}',[CollectionController::class, 'show_payment_request'])->name('tenant');
            Route::get('contracts', [TenantContractController::class,'index']);
            Route::get('bill/export', [BillController::class, 'export_soa']);
            Route::get('bill/send', [BillController::class, 'send_bills']);
            Route::get('collection/{collection}/view', [CollectionController::class, 'export_ar']);
            Route::get('concerns', [TenantConcernController::class, 'index'])->name('tenant');
            Route::get('concern/create', [TenantConcernController::class, 'create'])->name('concern');

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
        Route::get('/', [OwnerController::class, 'index'])->name('owner')->scopeBindings();
        Route::get('/unlock', [OwnerController::class, 'unlock'])->name('owner');
        Route::get('{owner:uuid}', [OwnerController::class, 'show'])->name('owner');

        Route::prefix('{owner}')->group(function(){
            Route::prefix('representative')->group(function(){
                Route::get('create', [RepresentativeController::class, 'create']);
            });

            Route::prefix('bank')->group(function(){
                Route::get('create', [BankController::class, 'create'])->name('owner');
            });


            Route::get('bills', [BillController::class, 'owner_index']);

            Route::get('unit', [OwnerDeedOfSalesController::class, 'create']);

            Route::get('deed_of_sales', [OwnerDeedOfSalesController::class, 'index']);
            Route::get('enrollees', [OwnerEnrolleeController::class, 'index']);
            Route::get('collection/{batch_no?}', [OwnerCollectionController::class,'destroy']);
            Route::post('bill/store', [OwnerBillController::class, 'store']);
            Route::get('bill/export', [OwnerBillController::class, 'export']);
            Route::get('bill/send', [OwnerBillController::class, 'send']);
            Route::get('collections', [OwnerCollectionController::class, 'index'])->name('owner');
            Route::get('collection/{collection}/export', [OwnerCollectionController::class, 'export']);
            Route::get('collection/{collection}/view', [OwnerCollectionController::class, 'view']);
            Route::get('collection/{collection}/attachment', [OwnerCollectionController::class, 'attachment']);
            Route::get('collection/{collection}/proof_of_payment', [OwnerCollectionController::class, 'proof_of_payment']);
            Route::get('edit', [OwnerController::class, 'edit']);

            Route::get('bills/{batch_no}/pay', [OwnerCollectionController::class, 'edit']);
            Route::patch('bills/{batch_no}/pay/update', [OwnerCollectionController::class, 'update']);
        });
    });

    Route::get('/guest/{guest}/bill/{bill}/edit', [BillController::class, 'edit_bill'])->name('bill');

    //Routes for Bill
    Route::prefix('bill')->group(function(){
        // // Route::get('{type?}/{type_id?}/{batch_no?}/{drafts?}', [BillController::class, 'index'])->name('bill');
        // Route::get('export/status/{status?}/particular/{particular?}/date/{date?}', [BillController::class, 'export']);
        Route::get('customized/{batch_no}',[BillController::class,'bulk_edit'])->name('bill');
        // Route::get('{random_str}/delete/{count}', [BillController::class, 'confirm_bill_deletion'])->name('bill');

        // Route::get('/batch/{batch_no}/drafts', [BillController::class, 'drafts'])->name('bill');

         Route::get('{batch_no?}/{drafts?}', [BillController::class, 'index'])->name('bill');
         Route::get('export/status/{status?}/particular/{particular?}/date/{date?}', [PropertyBillController::class,'export']);
         Route::get('customized/{batch_no}/edit',[BillController::class,'bulk_edit'])->name('bill');
        //  Route::get('{random_str}/delete/{count}', [PropertyBillController::class,'confirm_bill_deletion'])->name('bill');

         Route::get('/batch/{batch_no}/drafts', [BillController::class, 'drafts'])->name('bill');


    });

    //Routes for Cashflow
    Route::prefix('financial')->group(function(){
        Route::get('/', [FinancialController::class, 'index'])->name('financial');
        Route::get('export/{startDate}/{endDate}', [FinancialController::class, 'export']);
    });




    Route::get('dcr/{start_date}/{end_date}/{format}', [CollectionController::class, 'export_dcr']);

    //Routes for Collection
    Route::prefix('collection')->group(function(){
           Route::get('/', [CollectionController::class, 'index'])->name('collection');
           Route::get('/{status}', [CollectionController::class, 'paymentVerificationIndex'])->name('collection');;

    });

    //Routes for Account Payable
    Route::prefix('accountpayable')->group(function(){
        Route::get('/', [AccountPayableController::class, 'index'])->name('accountpayable');
        Route::get('export/{status?}/{created_at?}/{request_for?}/{limitDisplayTo?}', [AccountPayableController::class, 'export']);


        Route::get('{accountPayable}', [AccountPayableController::class, 'show'])->name('accountpayable');
        Route::get('{accountPayable}/liquidation/step-1', [LiquidationController::class, 'step1'])->name('accountpayable');
        Route::post('{accountPayable}/liquidation/step-1', [LiquidationController::class, 'step1'])->name('accountpayable');
        Route::get('{accountPayable}/liquidation/step-2', [LiquidationController::class, 'step2'])->name('accountpayable');
        Route::get('{accountPayable}/liquidation/{liquidation}/export', [LiquidationController::class, 'export'])->name('accountpayable');
        Route::get('{accountPayable}/export/complete', [LiquidationController::class,'export_complete'])->name('accountpayable');


        Route::get('{accountPayable}/download', [AccountPayableController::class, 'download']);

        Route::controller(RequestForPurchaseController::class)->group(function () {

            Route::get('{accountPayable}', 'show')->name('accountpayable');
            Route::get('{id}/attachment',  'download');

            // Route::get('{accountPayable}/export/step-1', [AccountPayableController::class, 'export_step1']);

            Route::get('{id}/approve', 'approve');
            //Route::get('{str_random}/create', 'create')->name('accountpayable');

            //step 1
            Route::get('{accountpayable}/{batch_no}/store', 'store');
            Route::get('{accountpayable}/step1/export', 'download_step_1');

            //step 2
            Route::get('{accountpayable}/step-1', 'create_step_1')->name('accountpayable');


            //step 3
            Route::get('{accountpayable}/step-2', 'create_step_2')->name('accountpayable');

            Route::get('{accountpayable}/step-3', 'create_step_3')->name('accountpayable');


            //step 4
            Route::get('{accountpayable}/step-4', 'create_step_4')->name('accountpayable');

            //step 5
            Route::get('{accountpayable}/step-5', 'create_step_5')->name('accountpayable');

            //step 6
            Route::get('{accountpayable}/step-6', 'create_step_6')->name('accountpayable');

            Route::get('{accountpayable}/step-7', 'create_step_7')->name('accountpayable');


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
        Route::get('/', [ConcernController::class, 'index'])->name('concern');
        Route::get('create', [ConcernController::class, 'create'])->name('concern');
        Route::get('{concern}/edit', [ConcernController::class, 'edit'])->name('concern');
    });

    //Routes for Team
    Route::prefix('personnel')->group(function(){
        Route::get('/', [PersonnelController::class, 'index'])->name('personnel');
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

    Route::get('roles', [RoleController::class, 'index']);
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
