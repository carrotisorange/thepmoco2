<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\PortfolioController;

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

require __DIR__.'/sale.php';

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

Route::get('/', function(){
     return view('landing.landingpage');});

Route::get('/landing-propsuite', function(){
     return view('landing.landingpage-propsuite');});

     Route::get('/landing-pmo', function(){
        return view('landing.landingpage-pmo');});

     Route::get('/landingpagecopy', function(){
        return view('landing.landingpagecopy');});

        Route::get('/landinglanding', function(){
            return view('landing.landinglanding');});


 //Routes for Property
Route::controller(ArticleController::class)->group(function () {
    Route::get('articles', 'index')->name('articles');
    Route::get('article/{id}', 'show')->name('articles');
});

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('charts.portfolio');

Route::get('/about', function(){
    return view('landing.about');
});

Route::get('/faq', function(){
    return view('landing.faq');
});

Route::get('/job', function(){
    return view('landing.job');
});

Route::get('/owner-corner', function(){
    return view('landing.owner-corner');
});

Route::get('/agent-corner', function(){
    return view('landing.agent-corner');
});

Route::get('/tech-support', function(){
    return view('landing.tech-support');
});

Route::get('/support', function(){
    return view('landing.support');
});

Route::get('/terms', function(){
    return view('landing.terms');
});

Route::get('/privacy', function(){
    return view('landing.privacy');
});

// articles


Route::get('/hoa-payable', function(){
    return view('HOA.AP.hoa-payable');
});

Route::get('/receipts', function(){
    return view('HOA.AP.receipts');
});

Route::get('/homeowners', function(){
    return view('HOA.homeowners.homeowners');
});

//homeowner portal

Route::get('/welcome', function(){
    return view('HOA.homeowner.welcome');
});

Route::get('/profile-setup', function(){
    return view('HOA.homeowner.profile-setup');
});






Route::get('/proprent', function(){
    return view('proprent.proprent');
});

Route::get('/proprent-search', function(){
    return view('proprent.proprent-search');
});
Route::get('/propman', function(){
    return view('propman.propman');
});

Route::get('/propbiz', function(){
    return view('propbiz.propbiz');
});

Route::get('/proppay', function(){
    return view('proppay.proppay');
});

Route::get('/pricing', function(){
    return view('landing.pricing');
});

Route::get('/resources', function(){
    return view('landing.resources');
});

Route::get('/propsuite', function(){
    return view('landing.propsuite.propsuite');
});

Route::get('/propsuite-lite', function(){
    return view('landing.propsuite.propsuite-lite');
});

Route::get('/propsuite-daily', function(){
    return view('landing.propsuite.propsuite-daily');
});

Route::get('/propsuite-hoa', function(){
    return view('landing.propsuite.propsuite-hoa');
});

Route::get('/propsuite-condo', function(){
    return view('landing.propsuite.propsuite-condo');
});

Route::get('/demopage', function(){
    return view('landing.demopage');
});

Route::get('/demo', function(){
    return view('landing.demo');
});

//demo
Route::get('/calendar-demo', function(){
    return view('help.calendar-demo');
});

Route::get('/guest-demo', function(){
    return view('help.guest-demo');
});

Route::get('/utilities-demo', function(){
    return view('help.utilities-demo');
});

Route::get('/personnel-demo', function(){
    return view('help.personnel-demo');
});

Route::get('/bill-delete-demo', function(){
    return view('help.bill-delete-demo');
});



Route::get('/survey', function(){
    return view('landing.survey');
});




// Route::post('/register', function(Request $request){

//     $attributes = $request->validate([
//     'name' => ['required', 'string', 'max:255'],
//     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//     'mobile_number' => ['required', 'unique:users'],
//     ]);

//     User::create($attributes);

//     return back()->with('success', 'The form has been submitted!');
// });
