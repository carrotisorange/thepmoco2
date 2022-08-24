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

Route::get('/announcement', function(){
    return view('newlayout.announcement');
});

Route::get('/portfolio', function(){
    return view('newlayout.portfolio');
});

Route::get('/contracts', function(){
    return view('newlayout.contracts');
});

Route::get('/bills', function(){
    return view('newlayout.bills');
});

Route::get('/payments', function(){
    return view('newlayout.payments');
});

Route::get('/concerns', function(){
    return view('newlayout.concerns');
});

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