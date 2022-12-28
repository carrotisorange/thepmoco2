<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

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

//show this route if a user tries to access broken links
Route::fallback(function () {
    return view('layouts.not-found');
});

// Route::get('/landingpage', function(){
//     return view('landing.landingpage');
// });



Route::get('/about', function(){
    return view('landing.about');
});

Route::get('/faq', function(){
    return view('landing.faq');
});

Route::get('/support', function(){
    return view('landing.support');
});

Route::get('/blog', function(){
    return view('landing.blog');
});

Route::get('/terms', function(){
    return view('landing.terms');
});

Route::get('/privacy', function(){
    return view('landing.privacy');
});

Route::get('/article1', function(){
    return view('landing.article1');
});

Route::get('/article2', function(){
    return view('landing.article2');
});

Route::get('/article3', function(){
    return view('landing.article3');
});

Route::get('/article4', function(){
    return view('landing.article4');
});



Route::get('/demopage', function(){
    return view('landing.demopage');
});

Route::get('/demo', function(){
    return view('landing.demo');
});

Route::post('/register', function(Request $request){

    $attributes = $request->validate([
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    'mobile_number' => ['required', 'unique:users'],
    ]);

    User::create($attributes);

    return back()->with('success', 'The form has been submitted!');
});
