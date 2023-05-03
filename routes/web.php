<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\Guest;

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

// help
Route::get('/help', function(){
    return view('help.help');
});

Route::get('/calendar-demo', function(){
    return view('help.calendar-demo');
});

Route::get('/guest-demo', function(){
    return view('help.guest-demo');
});

//show this route if a user tries to access broken links
Route::fallback(function () {
    return view('layouts.not-found');
});
