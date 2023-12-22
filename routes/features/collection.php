 <?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Features\CollectionController;

    Route::get('dcr/{start_date}/{end_date}/{format}', [CollectionController::class, 'export_dcr']);

    Route::prefix('collection')->group(function(){
           Route::get('/', [CollectionController::class, 'index'])->name('collection');
           Route::get('/{status}', [CollectionController::class, 'paymentVerificationIndex'])->name('collection');
           Route::get('/{collection:ar_no}/tenant/{tenant}/edit', [CollectionController::class, 'edit'])->name('collection');
    });
