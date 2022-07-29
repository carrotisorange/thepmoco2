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
use App\Http\Controllers\AcknowledgementReceiptController;
use App\Http\Controllers\ConcernController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\TimestampController;
use App\Http\Controllers\EnrolleeController;
use App\Http\Controllers\OwnerDeedOfSalesController;
use App\Http\Controllers\ParticularController;
use App\Http\Controllers\UnitMasterlistController;
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
use App\Http\Controllers\ExportSignedContractController;
use App\Http\Controllers\MoveoutContractBillController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\UnitEnrolleeController;
use App\Http\Controllers\UserController;

Route::group(['middleware'=>['auth', 'verified']], function(){

    Route::prefix('/property')->group(function(){
        Route::get('/', [PropertyController::class, 'index'])->name('property');
        Route::get('{random_str}/create', [PropertyController::class, 'create']);
        Route::post('{random_str}/store', [PropertyController::class, 'store']);
    });

    //Routes for Particular
    Route::prefix('particular')->group(function(){
        Route::post('store', [ParticularController::class, 'store']);
    });


    Route::prefix('/property/{property:uuid}')->group(function(){
        //Routes for Property
        Route::get('/', [PropertyController::class, 'show'])->name('dashboard');
        Route::get('edit', [PropertyController::class, 'edit']);
        Route::patch('update',[PropertyController::class, 'update']);
        Route::get('delete', [PropertyController::class, 'destroy']);

    //Route for Building
    Route::prefix('/building')->group(function(){
        Route::post('{random_str}/store',[BuildingController::class, 'store']);
    });


    //Routes for Unit
    Route::prefix('unit')->group(function(){
        Route::get('/', [UnitController::class, 'index'])->name('unit');
       
            Route::post('{batch_no:batch_no}/store', [UnitController::class, 'store']);
            Route::get('{batch_no:batch_no}/edit', [UnitController::class, 'bulk_edit']);
            Route::get('{batch_no}/create', [UnitController::class, 'create']);
            //Route::patch('{batch_no}/update', [UnitController::class, 'bulk_update']);
            Route::get('masterlist', [UnitMasterlistController::class, 'index']);

        Route::prefix('{unit}')->group(function(){
            Route::get('/', [UnitController::class, 'show'])->scopeBindings();
            Route::get('enrollee', [UnitEnrolleeController::class, 'index']);
            // Route::get('edit', [UnitController::class, 'edit']);
            Route::patch('update', [UnitController::class, 'update']);
            Route::get('contracts', [UnitContractController::class, 'index']);

            Route::prefix('tenant')->group(function(){
                Route::get('{random_str}/old_create', [UnitContractController::class, 'create']);
                Route::get('{random_str}/old_create/export', [UnitContractController::class, 'export']);
                Route::get('{tenant}/contract/{random_str}/create',[ContractController::class,'create']);
            });

            // Route::prefix('deed_of_sale')->group(function(){
            //     Route::post('{random_str}/create',[DeedOfSaleController::class,'create']);
            //     Route::post('{random_str}/store',[DeedOfSaleController::class,'store']);
            // });

                
            Route::prefix('owner')->group(function(){
                Route::get('/', [OwnerController::class, 'index']);
                Route::get('{random_str}/create', [OwnerController::class, 'create']);
                Route::post('{random_str}/store', [OwnerController::class, 'store']);


                Route::prefix('{owner}')->group(function(){
        
                    Route::prefix('deed_of_sale')->group(function(){
                        Route::get('{random_str}/create',[DeedOfSaleController::class,'create']);
                        Route::post('{random_str}/store', [DeedOfSaleController::class,'store']);
                    });

                    Route::prefix('enrollee')->group(function(){
                        Route::get('{random_str}/create',[EnrolleeController::class,'create']);
                        Route::post('{random_str}/store', [EnrolleeController::class,'store']);
                    });
                });
       
            });
            
            Route::get('deed_of_sales', [UnitDeedOfSalesController::class, 'index']);
            
            
            Route::get('bills', [UnitBillController::class, 'index']);
        });
    });

    //Routes for Tenant
    Route::prefix('/tenant')->group(function(){
        Route::get('/', [TenantController::class, 'index'])->name('tenant');
        Route::get('{tenant:uuid}', [TenantController::class, 'show']);
    
        Route::prefix('{tenant}')->group(function(){
            Route::get('bills', [TenantBillController::class, 'index']);
            Route::get('bills/{batch_no}/pay', [TenantCollectionController::class, 'edit']);
            Route::patch('bills/{batch_no}/pay/update', [TenantCollectionController::class, 'update']);
            Route::get('collections', [TenantCollectionController::class,'index']);
            Route::get('collection/{batch_no}', [TenantCollectionController::class,'destroy']);
            Route::get('contracts', [TenantContractController::class,'index']);
            Route::get('delete', [TenantController::class, 'destroy']);
            Route::post('bill/store', [TenantBillController::class, 'store']);
            Route::get('bill/export', [TenantBillController::class, 'export']);
            Route::get('bill/send', [TenantBillController::class, 'send']);
            //Route::get('collection/store', [TenantCollectionController::class, 'store']);
            Route::get('ar/{ar}/export', [TenantCollectionController::class, 'export']);
            Route::get('concerns', [TenantConcernController::class, 'index']);
            Route::get('units', [TenantContractController::class, 'create']);
            Route::get('ledger', [TenantLedgerController::class, 'index']);

            Route::prefix('guardian')->group(function(){
                Route::get('{unit?}/create', [GuardianController::class, 'create']);
            });

            Route::prefix('reference')->group(function(){
                Route::get('{unit?}/create', [ReferenceController::class, 'create']);
            });
        
            Route::prefix('/contract')->group(function(){
                Route::prefix('{contract}')->group(function(){
                    Route::get('renew', [ContractController::class, 'renew']);
                    Route::get('moveout', [ContractController::class, 'moveout']);
                    Route::get('export', [ContractController::class, 'export']);
                    Route::get('transfer', [ContractController::class, 'transfer']);
                });
            });  
        });
});
    
    //Routes for Owner
    Route::prefix('owner')->group(function(){
        Route::get('/', [OwnerController::class, 'index'])->name('owner');


        Route::prefix('{owner}')->group(function(){
            
            Route::get('/', [OwnerController::class, 'show']);
             
            Route::prefix('enrollee')->group(function(){
                Route::get('/',[EnrolleeController::class,'index']);
            });

            Route::prefix('representative')->group(function(){
                Route::get('create', [RepresentativeController::class, 'create']);
            });

            Route::prefix('bank')->group(function(){
                Route::get('create', [BankController::class, 'create']);
            });

            Route::get('units', [OwnerDeedOfSalesController::class, 'create']);

            Route::get('deed_of_sales', [OwnerDeedOfSalesController::class, 'index']);
            Route::get('enrollees', [OwnerEnrolleeController::class, 'index']);
            Route::get('bills', [OwnerBillController::class, 'index']);
            Route::get('collections', [OwnerCollectionController::class, 'index']);
            Route::get('edit', [OwnerController::class, 'edit']);
        });      
    });

  
    //Routes for Bill
    Route::prefix('bill')->group(function(){
        Route::get('/{batch_no?}', [BillController::class, 'index'])->name('bill');
        
        Route::prefix('{bill}')->group(function(){
            Route::delete('delete', [BillController::class, 'destroy']);
        });

        Route::post('express/{bill_count}/store',[ PropertyBillExpressController::class, 'store']);
        Route::post('customized/{bill_count}/store',[PropertyBillCustomizedController::class,'store']);
        Route::get('customized/{batch_no}/edit',[PropertyBillCustomizedController::class,'edit']);
        Route::patch('customized/batch/{batch_no}',[PropertyBillCustomizedController::class,'update']);
      
    });

    //Routes for Payment
    Route::prefix('payment')->group(function(){
        Route::get('/', [AcknowledgementReceiptController::class, 'index'])->name('payment');
    });

    //Routes for Concern
    Route::prefix('concern')->group(function(){
        Route::get('/', [ConcernController::class, 'index'])->name('concern');
    });

    //Routes for Team
    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('{random_str}/create', [UserController::class, 'create']);


        Route::prefix('{user}')->group(function(){
            Route::get('edit', [TeamController::class, 'edit']);
            Route::patch('update', [TeamController::class, 'update']);
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

    //'Route::get('tenant/{tenant}/unit/{unit}/contract/units', [TenantContractController::class, 'units']);
    Route::get('tenant/{tenant}/unit/{unit}/edit', [TenantContractController::class, 'create']);
    // Route::get('tenant/{tenant}/unit/{unit}/contract/create', [TenantContractController::class, 'create']);


    Route::post('unit/{unit}/tenant/{tenant}/contract/{random_str}/store', [ContractController::class, 'store']);
    Route::get('/contract/{contract}/edit', [ContractController::class, 'edit']);
    Route::get('/contract/{contract}/preview', [ContractController::class, 'preview']);
    Route::patch('/contract/{contract}/update', [ContractController::class, 'update']);
    //5
    Route::get('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/create',[BillController::class,'create']);
    Route::post('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/store',[BillController::class,'store']);

    Route::get('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/create',[BillController::class,'create']);
    Route::post('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/store',[BillController::class,'store']);

    Route::get('/contract/{contract}/moveout/bills', [MoveoutContractBillController::class, 'index']);

    Route::get('/contract/{contract}/signed_contract', [ExportSignedContractController::class, 'index']);

    Route::get('/leasing/{enrollee}/pullout', [EnrolleeController::class, 'update']);
});
