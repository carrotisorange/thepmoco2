<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



require __DIR__.'/auth.php';

require __DIR__.'/portfolio.php';

require __DIR__.'/property.php';

require __DIR__.'/dashboard.php';

require __DIR__.'/tenant.php';

require __DIR__.'/owner.php';

require __DIR__.'/user.php';

require __DIR__.'/marketing.php';

//All routes that do not require authentication and verification
require __DIR__.'/checkout.php';


use App\Http\Controllers\ExportExcelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(ExportExcelController::class)->group(function(){
    Route::get('index', 'index');
    Route::get('export/excel', 'exportExcelFile')->name('export.excel');
});

Route::get('/unit-remittance', function(){
    return view('remittance.unit-remittance');
});

//HOA

Route::get('/hoa-creation', function(){
    return view('HOA.property.hoa-creation');
});

Route::get('/hoa-documents', function(){
    return view('HOA.property.hoa-documents');
});

Route::get('/election', function(){
    return view('HOA.election.management.election');
});

Route::get('/policy-form', function(){
    return view('HOA.election.management.policy-form');
});

Route::get('/candidates', function(){
    return view('HOA.election.management.candidates');
});

Route::get('/ballot-form', function(){
    return view('HOA.election.management.ballot-form');
});


Route::get('/election-owner', function(){
    return view('HOA.election.house-owners.election-owner');
});

Route::get('/vote', function(){
    return view('HOA.election.house-owners.vote');
});

Route::get('/proxy', function(){
    return view('HOA.election.house-owners.proxy');
});

Route::get('/submitted', function(){
    return view('HOA.election.house-owners.submitted');
});

Route::get('/election-end', function(){
    return view('HOA.election.house-owners.election-end');
});

Route::get('/proxy-voters', function(){
    return view('HOA.election.management.proxy-voters');
});

Route::get('/qualified-votes', function(){
    return view('HOA.election.management.qualified-votes');
});


//liq rfp

Route::get('/pending-approval-manager', function(){
    return view('accountpayables.pending-approval-manager');
});

Route::get('/pending-approval-ap', function(){
    return view('accountpayables.pending-approval-ap');
});

Route::get('/approved-page', function(){
    return view('accountpayables.approved-page');
});

Route::get('/restricted-page', function(){
    return view('accountpayables.restricted-page');
});

Route::get('/liquidation', function(){
    return view('properties.liquidations.liquidation');
});

Route::get('/liquidation-view', function(){
    return view('properties.liquidations.liquidation-view');
});

Route::get('/step3', function(){
    return view('properties.liquidations.step3');
});



// help
Route::get('/help', function(){
    return view('help.help');
})->middleware(['auth', 'verified']);

Route::get('/calendar-demo', function(){
    return view('help.calendar-demo');
});

Route::get('/guest-demo', function(){
    return view('help.guest-demo');
});

Route::get('/personnel-demo', function(){
    return view('help.personnel-demo');
});

Route::get('/utilities-demo', function(){
    return view('help.utilities-demo');
});

Route::get('/bill-delete-demo', function(){
    return view('help.bill-delete-demo');
});

//proprent

Route::get('/proprent', function(){
    return view('proprent.proprent');
});

Route::get('/proprent/select-role', function(){
    return view('proprent.select-role');
});

Route::get('/proprent/sign-in', function(){
    return view('proprent.sign-in');
});

Route::get('/proprent/sign-up', function(){
    return view('proprent.sign-up');
});

Route::get('/proprent/profile', function(){
    return view('proprent.profile');
});

Route::get('proprent/results', function(){
    return view('proprent.results');
});

Route::get('proprent/room', function(){
    return view('proprent.room');
});

Route::get('proprent/reservation', function(){
    return view('proprent.reservation');
});

Route::get('proprent/upload-listing', function(){
    return view('proprent.upload-listing');
});

Route::get('proprent/all-listings', function(){
    return view('proprent.all-listings');
});

Route::get('date-page', function(){
    return view('proprent.date-page');
});

Route::get('budget-page', function(){
    return view('proprent.budget-page');
});

//show this route if a user tries to access broken links
Route::fallback(function () {
    return view('layouts.not-found');
});
