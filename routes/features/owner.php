<?php
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\OwnerDeedOfSalesController;
    use App\Http\Controllers\OwnerBillController;
    use App\Http\Controllers\OwnerCollectionController;
    use App\Http\Controllers\Subfeatures\BankController;
    use App\Http\Controllers\Subfeatures\RepresentativeController;

    use App\Http\Controllers\Features\OwnerController;
    use App\Http\Controllers\Features\BillController;

    Route::prefix('owner')->group(function(){
        Route::controller(OwnerController::class)->group(function(){
            Route::get('/',  'index')->name('owner')->scopeBindings();
            Route::get('/unlock', 'unlock')->name('owner');
            Route::get('{owner:uuid}',  'show')->name('owner');
            Route::get('{uuid:uuid}/user', 'generate_credentials');
        });

        Route::prefix('{owner}')->group(function(){
            Route::prefix('representative')->group(function(){
                Route::get('create', [RepresentativeController::class, 'create']);
            });

            Route::prefix('bank')->group(function(){
                Route::get('create', [BankController::class, 'create'])->name('owner');
            });

            // Route::get('bills', [BillController::class, 'owner_index']);

            Route::get('unit', [OwnerDeedOfSalesController::class, 'create']);

            Route::get('deed_of_sales', [OwnerDeedOfSalesController::class, 'index']);
            Route::get('edit', [OwnerController::class, 'edit']);

            Route::controller(OwnerBillController::class)->group(function(){
                Route::post('bill/store', 'store');
                Route::get('bill/export', 'export');
                Route::get('bill/send', 'send');
            });

            Route::controller(OwnerCollectionController::class)->group(function(){
                Route::get('collections', 'index')->name('owner');
                Route::get('collection/{collection}/export','export');
                Route::get('collection/{collection}/view','view');
                Route::get('collection/{collection}/attachment','attachment');
                Route::get('collection/{collection}/proof_of_payment', 'proof_of_payment');
                Route::get('collection/{batch_no?}','destroy');
                Route::get('bills/{batch_no}/pay', 'edit');
                Route::patch('bills/{batch_no}/pay/update','update');
            });
        });
    });
