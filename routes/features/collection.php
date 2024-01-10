 <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Features\CollectionController;

    Route::controller(CollectionController::class)->group(function () {
        Route::prefix('collection')->group(function(){
            Route::get('export/{start_date}/{end_date}/{format}','export_dcr');
            Route::get('/', 'index')->name('collection');
            Route::get('{status}',  'paymentVerificationIndex')->name('collection');
            Route::get('{collection:ar_no}/{type}/{uuid}/edit', 'edit')->name('collection');
            Route::get('{type}/{uuid}/{batch_no}/pay', 'showCollections')->name('collection');
            Route::patch('{type}/{uuid}/{batch_no}/pay','updateCollections')->name('collection');
        });
    });


