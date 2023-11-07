   <?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ConcernController;

    Route::controller(ConcernController::class)->group(function () {
        Route::prefix('concern')->group(function(){
            Route::get('/', 'index')->name('concern');
            Route::get('create','create')->name('concern');
            Route::get('{concern}/edit', 'edit')->name('concern');
        });
    });
