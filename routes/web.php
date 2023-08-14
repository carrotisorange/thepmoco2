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

Route::get('/', function(){
     return view('landing.landingpage');});

Route::get('/landing-propsuite', function(){
     return view('landing.landingpage-propsuite');});

     Route::get('/landing-pmo', function(){
        return view('landing.landingpage-pmo');});

     Route::get('/landingpagecopy', function(){
        return view('landing.landingpagecopy');});

      


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

Route::get('/blog', function(){
    return view('landing.blog');
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

// articles
Route::get('/How-The-PMO-Started', function(){
    return view('landing.articles.article1');
});

Route::get('/article1', function(){
    return view('landing.articles.article1');
});


Route::get('/How-to-use-a-leasing-management-system-to-improve-operational-efficiency', function(){
    return view('landing.articles.article2');
});

Route::get('/article2', function(){
    return view('landing.articles.article2');
});

Route::get('/What-are-the-benefits-of-a-property-management-system-for-property-managers', function(){
    return view('landing.articles.article3');
});

Route::get('/article3', function(){
    return view('landing.articles.article3');
});

Route::get('/Secret-Recipe-For-Brand-Building-As-Small-Business', function(){
    return view('landing.articles.article4');
});

Route::get('/article4', function(){
    return view('landing.articles.article4');
});

Route::get('/What-do-we-offer-as-a-SaaS-company-to-property-managers-and-owners', function(){
    return view('landing.articles.article5');
});

Route::get('/article5', function(){
    return view('landing.articles.article5');
});

Route::get('/Why-Digitalization-is-the-best-strategy-for-2023', function(){
    return view('landing.articles.article6');
});

Route::get('/article6', function(){
    return view('landing.articles.article6');
});

Route::get('/How-To-Improve-Tenant-Retention-Rates', function(){
    return view('landing.articles.article7');
});

Route::get('/article7', function(){
    return view('landing.articles.article7');
});

Route::get('/Importance-of-having-a-Housekeeping-Program-for-Rental-Properties', function(){
    return view('landing.articles.article8');
});

Route::get('/article8', function(){
    return view('landing.articles.article8');
});

Route::get('/How-to-reduce-digitalization-pain-points', function(){
    return view('landing.articles.article9');
});

Route::get('/article9', function(){
    return view('landing.articles.article9');
});

Route::get('/Why-Designing-Beautiful-Rentable-Spaces-Has-Over-All-Positive-Results', function(){
    return view('landing.articles.article10');
});

Route::get('/article10', function(){
    return view('landing.articles.article10');
});

Route::get('/How-an-Online-Property-Management-System-Improves-Business-Profitability-for-Landlords', function(){
    return view('landing.articles.article11');
});

Route::get('/article11', function(){
    return view('landing.articles.article11');
});

Route::get('/How-Digital-Systems-Improve-Tenant-Retention-and-Satisfaction', function(){
    return view('landing.articles.article12');
});

Route::get('/article12', function(){
    return view('landing.articles.article12');
});

Route::get('/How-to-Improve-Building-Security-to-Make-Residents-Feel-Safe', function(){
    return view('landing.articles.article13');
});

Route::get('/article13', function(){
    return view('landing.articles.article13');
});

Route::get('/How-Smart-Landlords-Keep-Tenants-Happy-So-They-Dont-Move-Out', function(){
    return view('landing.articles.article14');
});

Route::get('/article14', function(){
    return view('landing.articles.article14');
});

Route::get('/Is-a-vacation-rental-more-profitable-than-a-long-term-rental-property', function(){
    return view('landing.articles.article15');
});

Route::get('/article15', function(){
    return view('landing.articles.article15');
});

Route::get('/10-Tips-to-increase-occupancy-rate-and-profitability-for-vacation-homes', function(){
    return view('landing.articles.article16');
});

Route::get('/article16', function(){
    return view('landing.articles.article16');
});

Route::get('/How-to-Choose-the-Right-Property-Management-Company', function(){
    return view('landing.articles.article17');
});

Route::get('/How-to-be-great-and-effective-at-rental-property-operations', function(){
    return view('landing.articles.article18');
});

Route::get('/How-to-Maximize-Profits-and-Minimize-Stress-when-Managing-Rental-Properties', function(){
    return view('landing.articles.article19');
});

Route::get('/How-to-Reduce-Energy-Consumption-in-a-Rental-Property', function(){
    return view('landing.articles.article20');
});

Route::get('/How-To-Reduce-Water-Wastage-in-multiple-unit-buildings-for-sustainable-operations', function(){
    return view('landing.articles.article21');
});

Route::get('/How-To-Be-An-Environmentally-Friendly-Rental-Property', function(){
    return view('landing.articles.article22');
});



Route::get('/propsuite', function(){
    return view('propsuite.propsuite');
});

Route::get('/propsuite2', function(){
    return view('propsuite.propsuite2');
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
