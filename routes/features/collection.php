 <?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\CollectionController;

    Route::get('dcr/{start_date}/{end_date}/{format}', [CollectionController::class, 'export_dcr']);

    Route::prefix('collection')->group(function(){
           Route::get('/', [CollectionController::class, 'index'])->name('collection');
           Route::get('/{status}', [CollectionController::class, 'paymentVerificationIndex'])->name('collection');;
    });
