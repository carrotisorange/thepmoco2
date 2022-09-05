<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Session;

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

require __DIR__.'/property.php';

require __DIR__.'/dashboard.php';

require __DIR__.'/tenant.php';

require __DIR__.'/owner.php';

require __DIR__.'/user.php';

require __DIR__.'/marketing.php';

//All routes that do not require authentication and verification
require __DIR__.'/checkout.php';


Route::get('/portfolio', function(){
    return view('newlayout.portfolio');
});

//tenant portal
Route::get('/tenantdashboard', function(){
    return view('newlayout.tenantdashboard');
});

Route::get('/tenantcontracts', function(){
    return view('newlayout.tenantcontracts');
});

Route::get('/tenantbills', function(){
    return view('newlayout.tenantbills');
});

Route::get('/tenantpayments', function(){
    return view('newlayout.tenantpayments');
});

Route::get('/tenantconcerns', function(){
    return view('newlayout.tenantconcerns');
});

Route::get('/tenantrequest', function(){
    return view('newlayout.tenantrequest');
});

Route::get('/tenantbills_detail', function(){
    return view('newlayout.tenantbills_detail');
});

Route::get('/tenant_close', function(){
    return view('newlayout.tenant_close');
});

// admin portal
Route::get('/newsignin', function(){
    return view('newlayout.newsignin');
});

Route::get('/newsignup', function(){
    return view('newlayout.newsignup');
});

Route::get('/createproperty', function(){
    return view('newlayout.createproperty');
});

Route::get('/newunits_list', function(){
    return view('newlayout.newunits_list');
});

Route::get('/newunits_thumbnail', function(){
    return view('newlayout.newunits_thumbnail');
});

Route::get('/newunits_detail', function(){
    return view('newlayout.newunits_detail');
});

Route::get('/newunits_rent', function(){
    return view('newlayout.newunits_rent');
});

Route::get('/newunits_owner', function(){
    return view('newlayout.newunits_owner');
});

Route::get('/newunits_rooms', function(){
    return view('newlayout.newunits_rooms');
});

Route::get('/newunits_furniture', function(){
    return view('newlayout.newunits_furniture');
});

Route::get('/newowners', function(){
    return view('newlayout.newowners');
});

Route::get('/admindashboard', function(){
    return view('newlayout.admindashboard');
});

Route::get('/success_property', function(){
    return view('newlayout.success_property');
});

Route::get('/newownerprofile', function(){
    return view('newlayout.newownerprofile');
});

Route::get('/newtenant', function(){
    return view('newlayout.newtenant');
});

Route::get('/employees', function(){
    return view('newlayout.employees');
});

Route::get('/newtenantprofile', function(){
    return view('newlayout.newtenantprofile');
});

Route::get('/newbills', function(){
    return view('newlayout.newbills');
});

Route::get('/addtenant1', function(){
    return view('newlayout.addtenant1');
});

Route::get('/addtenant2', function(){
    return view('newlayout.addtenant2');
});

Route::get('/addtenant3', function(){
    return view('newlayout.addtenant3');
});

Route::get('/addtenant4', function(){
    return view('newlayout.addtenant4');
});

Route::get('/addtenant5', function(){
    return view('newlayout.addtenant5');
});

Route::get('/addowner1', function(){
    return view('newlayout.addowner1');
});

Route::get('/addowner2', function(){
    return view('newlayout.addowner2');
});

Route::get('/addowner3', function(){
    return view('newlayout.addowner3');
});

Route::get('/addowner4', function(){
    return view('newlayout.addowner4');
});

Route::get('/addowner5', function(){
    return view('newlayout.addowner5');
});


Route::get('/cashflow', function(){
    return view('newlayout.cashflow');
});

Route::get('/newconcern_detail', function(){
    return view('newlayout.newconcern_detail');
});

Route::get('/newconcern_list', function(){
    return view('newlayout.newconcern_list');
});

Route::get('/newpayments', function(){
    return view('newlayout.newpayments');
});

Route::get('/accountspayables', function(){
    return view('newlayout.accountspayables');
});

// owner portal
Route::get('/ownerdashboard', function(){
    return view('newlayout.ownerdashboard');
});

Route::get('/ownerunits', function(){
    return view('newlayout.ownerunits');
});

Route::get('/ownerbills', function(){
    return view('newlayout.ownerbills');
});

Route::get('/ownerbills_detail', function(){
    return view('newlayout.ownerbills_detail');
});


Route::get('/ownerpayment', function(){
    return view('newlayout.ownerpayment');
});

Route::get('/ownerconcern', function(){
    return view('newlayout.ownerconcern');
});

Route::get('/addunits', function(){
    return view('newlayout.addunits');
});

Route::get('/individualbill', function(){
    return view('newlayout.individualbill');
});

Route::get('/createbills', function(){
    return view('newlayout.createbills');
});


Route::get('/newbills_detail', function(){
    return view('newlayout.newbills_detail');
});

Route::get('/unitbillshistory', function(){
    return view('newlayout.unitbillshistory');
});

Route::get('/paymenthistory', function(){
    return view('newlayout.paymenthistory');
});

Route::get('/paybills', function(){
    return view('newlayout.paybills');
});

Route::get('/addemployee', function(){
    return view('newlayout.addemployee');
});

Route::get('/dashboard_moveout', function(){
    return view('newlayout.dashboard_moveout');
});



Route::get('/banner', function(){
    return view('newlayout.banner');
});

Route::get('/terms', function(){
    return view('newlayout.terms');
});

Route::get('/privacy', function(){
    return view('newlayout.privacy');
});


Route::get('/landingpage', function(){
    return view('landing.landingpage');
});



















