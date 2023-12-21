<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Subfeatures\BookingController;
use App\Http\Controllers\PropertyController;

Route::group(['middleware'=>['auth', 'web','verified']], function(){

    Route::put('/booking/{booking}/update', [BookingController::class, 'update']);

    require __DIR__ .'/features/calendar.php';

    Route::prefix('/property/{property}')->group(function(){

        Route::controller(PropertyController::class)->group(function () {
            Route::get('edit', 'edit');
            Route::patch('update','update');
            Route::get('delete', 'destroy');
        });

        require __DIR__.'/features/rfp.php';
        require __DIR__.'/features/unit.php';
        require __DIR__.'/features/tenant.php';
        require __DIR__.'/features/election.php';
        require __DIR__.'/features/guest.php';
        require __DIR__.'/features/owner.php';
        require __DIR__.'/features/bill.php';
        require __DIR__.'/features/financial.php';
        require __DIR__.'/features/personnel.php';
        require __DIR__.'/features/remittance.php';
        require __DIR__.'/features/collection.php';
        require __DIR__.'/features/concern.php';
        require __DIR__.'/features/dashboard.php';
        require __DIR__.'/features/utility.php';
        require __DIR__.'/features/bulletin.php';
        require __DIR__.'/features/contract.php';
        require __DIR__.'/features/violation.php';
        require __DIR__.'/features/ancillary.php';
    });

    Route::get('/unit-calendar', function(){
        return view('features.calendars.unit-calendar');
    });

});
