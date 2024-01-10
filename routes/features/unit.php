
<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UnitContractController;
use App\Http\Controllers\UnitDeedOfSalesController;
use App\Http\Controllers\Subfeatures\DeedOfSaleController;
use App\Http\Controllers\UnitEnrolleeController;
use App\Http\Controllers\Subfeatures\BankController;
use App\Http\Controllers\UnitConcernController;
use App\Http\Controllers\UnitInventoryController;
use App\Http\Controllers\Subfeatures\GuardianController;
use App\Http\Controllers\Subfeatures\ReferenceController;
use App\Http\Controllers\Subfeatures\RepresentativeController;

use App\Http\Controllers\Features\UnitController;
use App\Http\Controllers\Features\RemittanceController;
use App\Http\Controllers\Features\GuestController;
use App\Http\Controllers\Features\OwnerController;
use App\Http\Controllers\Features\BillController;
use App\Http\Controllers\Features\ContractController;
use App\Http\Controllers\UnitBillController;
use App\Http\Controllers\WalletController;

        Route::prefix('unit')->group(function(){
            Route::controller(UnitController::class)->group(function(){
                Route::get('/', 'index')->name('unit');
                Route::get('{batch_no?}/edit', 'edit')->name('unit');
                Route::get('{unit:uuid}','show')->name('unit')->scopeBindings();
            });

            Route::prefix('{unit:uuid}')->group(function(){
            Route::get('remittances', [RemittanceController::class, 'show']);

            Route::get('tenant/{tenant}/guardian/{random_str}/create', [GuardianController::class, 'create']);

            Route::get('tenant/{tenant}/reference/{random_str}/create', [ReferenceController::class, 'create']);

            Route::get('{type}/utility/{utility}', [UnitBillController::class, 'create'])->name('unit');
            Route::get('utility/{utility}/edit', [UnitBillController::class, 'edit'])->name('unit');

            Route::get('{type}/utility/{utility}/success', [UnitBillController::class, 'success'])->name('unit');

            Route::get('guest/{guest}/movein', [GuestController::class, 'movein']);

            Route::get('guest/{guest}/moveout', [GuestController::class, 'moveout']);

            Route::get('tenant/{tenant}/contract/{contract}/bill/{random_str}/create', [BillController::class, 'create_new']);

            Route::get('tenant/{tenant}/contract/{contract}/movein/{random_str}/create', [ContractController::class, 'movein']);
            Route::get('tenant/{tenant}/contract/{contract}', [ContractController::class, 'show'])->name('contract');

            Route::get('tenant/{tenant}/contract/{contract}/deposit/{random_str}/create', [WalletController::class, 'create']);
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
                    Route::controller(GuestController::class)->group(function(){
                        Route::get('{random_str}/create','create')->name('guest');
                        Route::post('store', 'store');
                    });
                });

                Route::prefix('inventory')->group(function(){
                    Route::controller(UnitInventoryController::class)->group(function(){
                        Route::get('{random_str}/create', 'create')->name('unit');
                        Route::get('{unit_inventory}', 'upload_image')->name('unit');
                        Route::get('{random_str}/export','export')->name('unit');
                    });
                });

                Route::get('/tenant/{tenant}/contract/{contract}/inventory/create', [UnitInventoryController::class, 'movein_create'])->name('unit');

                Route::prefix('owner')->group(function(){
                    Route::controller(OwnerController::class)->group(function(){
                        Route::get('/', 'index')->scopeBindings();
                        Route::get('{random_str}/create', 'create')->name('unit');
                        Route::get('{owner}/delete', 'destroy');
                        Route::post('{random_str}/store','store');
                    });

                    Route::prefix('{owner}')->group(function(){
                        Route::prefix('deed_of_sale')->group(function(){
                            Route::controller(DeedOfSaleController::class)->group(function(){
                                Route::get('create','create');
                                Route::get('{deed_of_sale}/delete', 'destroy');
                                Route::get('{deed_of_sale}/backout', 'backout')->name('owner');
                                Route::get('{deed_of_sale}/edit', 'edit')->name('owner');
                                Route::post('{random_str}/store', 'store');
                            });
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

            });
        });
