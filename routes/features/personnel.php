 <?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Features\PersonnelController;

    Route::controller(PersonnelController::class)->group(function(){
        Route::prefix('personnel')->group(function(){
            Route::get('/', 'index')->name('personnel');
            Route::get('{random_str}/create', 'create')->name('user');
            Route::get('{user}/property/{property_uuid:uuid}/delegate', 'delegate');
        });
    });
