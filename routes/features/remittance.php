 <?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Features\RemittanceController;

    Route::controller(RemittanceController::class)->group(function(){
        Route::prefix('remittance')->group(function(){
            Route::get('/', 'index')->name('remittance');
            Route::get('export/date/{date}', 'export');
        });
    });
