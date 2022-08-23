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

Route::get('/newaccount', function(){
    return view('newlayout.newaccount');
});

Route::get('/newsignup', function(){
    return view('newlayout.newsignup');
});

Route::get('/createproperty', function(){
    return view('newlayout.createproperty');
});