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

Route::get('/job', function(){
    return view('landing.job');
});

Route::get('/support', function(){
    return view('landing.support');
});

Route::get('/blog-1', function(){
    return view('landing.blog-1');
});

Route::get('/blog-2', function(){
    return view('landing.blog-2');
});

Route::get('/blog-3', function(){
    return view('landing.blog-3');
});

Route::get('/blog-4', function(){
    return view('landing.blog-4');
});


Route::get('/terms', function(){
    return view('landing.terms');
});

Route::get('/privacy', function(){
    return view('landing.privacy');
});

Route::get('/article1', function(){
    return view('landing.articles.article1');
});

Route::get('/article2', function(){
    return view('landing.articles.article2');
});

Route::get('/article3', function(){
    return view('landing.articles.article3');
});

Route::get('/article4', function(){
    return view('landing.articles.article4');
});

Route::get('/article5', function(){
    return view('landing.articles.article5');
});

Route::get('/article6', function(){
    return view('landing.articles.article6');
});

Route::get('/article7', function(){
    return view('landing.articles.article7');
});

Route::get('/article8', function(){
    return view('landing.articles.article8');
});

Route::get('/article9', function(){
    return view('landing.articles.article9');
});

Route::get('/article10', function(){
    return view('landing.articles.article10');
});

Route::get('/article11', function(){
    return view('landing.articles.article11');
});

Route::get('/article12', function(){
    return view('landing.articles.article12');
});

Route::get('/article13', function(){
    return view('landing.articles.article13');
});

Route::get('/article14', function(){
    return view('landing.articles.article14');
});








Route::get('/demopage', function(){
    return view('landing.demopage');
});

Route::get('/demo', function(){
    return view('landing.demo');
});

Route::get('/survey', function(){
    return view('landing.survey');
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
