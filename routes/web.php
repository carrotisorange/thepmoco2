<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

require __DIR__.'/auth.php';

require __DIR__.'/feature.php';

require __DIR__.'/portals/sale.php';

require __DIR__.'/portals/tenant.php';

require __DIR__.'/portals/owner.php';

require __DIR__.'/user.php';

require __DIR__.'/checkout.php';

require __DIR__.'/portfolio.php';

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


Route::controller(ArticleController::class)->group(function () {
    Route::get('articles', 'index')->name('articles');
    Route::get('article/{id}', 'show')->name('articles');
});

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('charts.portfolio');

Route::get('/dashboard', function(){
    return view('dashboard.dashboard');
});

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

Route::get('/hoa-payable', function(){
    return view('HOA.AP.hoa-payable');
});

Route::get('/receipts', function(){
    return view('HOA.AP.receipts');
});

Route::get('/homeowners', function(){
    return view('HOA.homeowners.homeowners');
});


Route::get('/welcome', function(){
    return view('HOA.homeowner.welcome');
});

Route::get('/profile-setup', function(){
    return view('HOA.homeowner.profile-setup');
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

Route::get('/ar', function(){
    return view('export.ar');
});

Route::get('/collection', function(){
    return view('export.collection');
});

Route::get('/liquidation', function(){
    return view('export.liquidation');
});

Route::get('/soa', function(){
    return view('export.soa');
});

Route::get('/server-maintenance', function(){
    return view('properties.server-maintenance');
});    

Route::get('/unit-calendar', function(){
    return view('features.calendar.unit-calendar');
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

Route::get('proprent/profile', function(){
    return view('proprent.profile');
});

Route::get('proprent/all-listings', function(){
    return view('proprent.all-listings');
});

Route::get('proprent/upload-listing', function(){
    return view('proprent.upload-listing');
});