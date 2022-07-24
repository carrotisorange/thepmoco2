<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\DashboardSalesController;
use App\Http\Controllers\DashboardDevController;
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
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UnitDeedOfSalesController;
use App\Http\Controllers\UnitBillController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\TenantConcernController;
use App\Http\Controllers\TenantLedgerController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\DeedOfSaleController;
use App\Http\Controllers\PropertyBillCustomizedController;
use App\Http\Controllers\PropertyBillExpressController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ExportSignedContractController;
use App\Http\Controllers\MoveoutContractBillController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\ReferenceController;

Route::group(['middleware'=>['auth', 'verified']], function(){
    //Routes for dashboard
    Route::prefix('/dashboard')->group(function(){
        //Routes for Developer
        Route::get('sales', [DashboardSalesController::class, 'index']);
        Route::get('user/{id:id}/properties', [DashboardSalesController::class, 'show']);
        //Route for Sales Folk
        Route::get('dev', [DashboardDevController::class, 'index']);
    });

    Route::prefix('/property')->group(function(){
        Route::get('/', [PropertyController::class, 'index'])->name('property');
        Route::get('{random_str}/create', [PropertyController::class, 'create']);
        Route::post('{random_str}/store', [PropertyController::class, 'store']);
    });

    Route::prefix('/property/{property:uuid}')->group(function(){
        //Routes for Property
        Route::get('/', [PropertyController::class, 'show'])->name('dashboard');
        Route::get('edit', [PropertyController::class, 'edit']);
        Route::patch('update',[PropertyController::class, 'update']);
        Route::get('delete', [PropertyController::class, 'destroy']);

        //Routes for Unit
    Route::prefix('/unit')->group(function(){
        Route::get('/', [UnitController::class, 'index'])->name('unit');
            Route::patch('update', [UnitController::class, 'update']);
            Route::post('{batch_no}/store', [UnitController::class, 'store']);
            Route::get('{batch_no}/edit', [UnitController::class, 'bulk_edit'])->name('unit');
            Route::get('{batch_no}/create', [UnitController::class, 'create'])->name('unit');
            Route::patch('{batch_no}/update', [UnitController::class, 'bulk_update']);
            Route::get('masterlist', [UnitMasterlistController::class, 'index'])->name('unit');

        Route::prefix('{unit}')->group(function(){
            Route::get('/', [UnitController::class, 'show'])->name('unit');
            Route::get('contracts', [UnitContractController::class, 'index'])->name('unit');

            Route::prefix('tenant')->group(function(){
                Route::get('{random_str}/old_create', [UnitContractController::class, 'create'])->name('unit');
                Route::get('{random_str}/old_create/export', [UnitContractController::class, 'export']);
                Route::get('{tenant}/contract/{random_str}/create',[ContractController::class,'create'])->name('unit');
            });
                
            Route::prefix('owner')->group(function(){
                Route::prefix('/')->group(function(){

                });

                Route::prefix('{owner}')->group(function(){
                    Route::get('deed_of_sale/{random_str}/create',[DeedOfSaleController::class,'create'])->name('unit');
                });
       
            });
            
            Route::get('deed_of_sales', [UnitDeedOfSalesController::class, 'index']);
            Route::get('bills', [UnitBillController::class, 'index']);
        });
    });

    //Routes for Tenant
    Route::prefix('/tenant')->group(function(){
        Route::get('/', [TenantController::class, 'index'])->name('tenant');
        Route::get('{tenant:uuid}', [TenantController::class, 'show'])->name('tenant');
    
        Route::prefix('{tenant}')->group(function(){
            Route::get('bills', [TenantBillController::class, 'index'])->name('tenant');
            Route::get('bills/{batch_no}/pay', [TenantCollectionController::class, 'edit'])->name('tenant');
            Route::patch('bills/{batch_no}/pay/update', [TenantCollectionController::class, 'update']);
            Route::get('collections', [TenantCollectionController::class,'index'])->name('tenant');
            Route::get('collection/{batch_no}', [TenantCollectionController::class,'destroy']);
            Route::get('contracts', [TenantContractController::class,'index'])->name('tenant');
            Route::get('delete', [TenantController::class, 'destroy']);
            Route::post('bill/store', [TenantBillController::class, 'store']);
            Route::get('bill/export', [TenantBillController::class, 'export']);
            Route::get('bill/send', [TenantBillController::class, 'send']);
            //Route::get('collection/store', [TenantCollectionController::class, 'store']);
            Route::get('ar/{ar}/export', [TenantCollectionController::class, 'export']);
            Route::get('concerns', [TenantConcernController::class, 'index'])->name('tenant');
            Route::get('units', [TenantContractController::class, 'create'])->name('tenant');
            Route::get('ledger', [TenantLedgerController::class, 'index'])->name('tenants');

            Route::prefix('guardian')->group(function(){
                Route::get('create', [GuardianController::class, 'create'])->name('tenant');
            });

            Route::prefix('reference')->group(function(){
                Route::get('create', [ReferenceController::class, 'create'])->name('tenant');
            });
        
            Route::prefix('/contract')->group(function(){
                Route::prefix('{contract}')->group(function(){
                    Route::get('renew', [ContractController::class, 'renew'])->name('tenant');
                    Route::get('moveout', [ContractController::class, 'moveout'])->name('tenant');
                    Route::get('export', [ContractController::class, 'export']);
                    Route::get('transfer', [ContractController::class, 'transfer'])->name('tenant');
                });
            });  
        });
});
    
    //Routes for Owner
    Route::prefix('/owner')->group(function(){
        Route::get('/', [OwnerController::class, 'index'])->name('owner');
        Route::prefix('{owner}')->group(function(){
            Route::get('/', [OwnerController::class, 'show'])->name('owner');
       

            Route::prefix('representative')->group(function(){
                Route::get('create', [RepresentativeController::class, 'create'])->name('owner');
            });

            Route::prefix('bank')->group(function(){
                Route::get('create', [BankController::class, 'create'])->name('owner');
            });

            Route::get('units', [OwnerDeedOfSalesController::class, 'create'])->name('owner');

            Route::get('deed_of_sales', [OwnerDeedOfSalesController::class, 'index'])->name('owners');
            Route::get('enrollees', [OwnerEnrolleeController::class, 'index']);
            Route::get('bills', [OwnerBillController::class, 'index']);
            Route::get('collections', [OwnerCollectionController::class, 'index']);
            Route::get('edit', [OwnerController::class, 'edit'])->name('owners');
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
        Route::get('customized/{batch_no}/edit',[PropertyBillCustomizedController::class,'edit'])->name('bill');
        Route::patch('customized/batch/{batch_no}',[PropertyBillCustomizedController::class,'update']);
      
    });

     //Routes for Point
    Route::prefix('point')->group(function(){
        Route::get('/',[PointController::class, 'index'])->name('point');
    });

   

   
   

    //Routes for Payment
    Route::get('payments', [AcknowledgementReceiptController::class, 'index'])->name('payments');

    //Routes for Concern
    Route::get('concerns', [ConcernController::class, 'index'])->name('concerns');

    //Routes for Team
    Route::prefix('team')->group(function(){
        Route::get('/', [TeamController::class, 'index'])->name('team');


        Route::prefix('{user}')->group(function(){
            Route::get('edit', [TeamController::class, 'edit'])->name('team');
            Route::patch('update', [TeamController::class, 'update']);
        });
    });

    //Routes for Referral
    Route::prefix('referral')->group(function(){
        Route::get('/', [ReferralController::class, 'index'])->name('referrals');
    });
   

    //Routes for Timestamp
    Route::get('timestamps', [TimestampController::class, 'index'])->name('timestamps');

    //Routes for Enrollee
    Route::get('enrollees', [EnrolleeController::class, 'index'])->name('enrollees');

    //Routes for Particular
    Route::prefix('particular')->group(function(){
        Route::post('store', [ParticularController::class, 'store']);
    });
    

    //show contracts
    Route::get('/tenant_contract', [PropertyController::class, 'show_tenant_contract']);

    Route::get('/owner_contract', [PropertyController::class, 'show_owner_contract']);

    Route::get('roles', [PropertyRoleController::class, 'index']);
});

    Route::get('bill/{bills}', [CollectionController::class, 'create']);


    //edit an individual unit

    Route::post('building/{random_str}/store',[BuildingController::class, 'store']);

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


    Route::get('unit/{unit}/owner/{random_str}/create', [OwnerController::class, 'create'])->name('units');
    Route::post('unit/{unit}/owner/{random_str}/store', [OwnerController::class, 'store']);


    Route::post('unit/{unit}/owner/{owner}/deed_of_sale/{random_str}/store',[DeedOfSaleController::class,'store']);


    //4
    Route::get('unit/{unit}/owner/{owner}/enrollee/{random_str}/create',[EnrolleeController::class,'create'])->name('units');
    Route::post('unit/{unit}/owner/{owner}/enrollee/{random_str}/store', [EnrolleeController::class, 'store']);
    //3

    Route::get('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/create',[BillController::class,'create']);
    Route::post('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/store',[BillController::class,'store']);

    Route::patch('/profile/{user}/update',[UserController::class, 'update']);
    Route::get('/profile/{user}/edit',[UserController::class, 'edit'])->name('profile');

    Route::get('/contract/{contract}/moveout/bills', [MoveoutContractBillController::class, 'index'])->name('tenants');

    Route::get('/contract/{contract}/signed_contract', [ExportSignedContractController::class, 'index']);

    Route::get('/leasing/{enrollee}/pullout', [EnrolleeController::class, 'update']);
});
