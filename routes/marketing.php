<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\ContractController;
use Spatie\Analytics\Period;

// Route::post('/subscribe', SubscribeController::class);
// Route::post('/contact', ContactController::class);

// Route::get('data', function(){
//     $analyticsData = Analytics::performQuery(
//     Period::years(1),
//     'ga:sessions',
//     [
//     'metrics' => 'ga:sessions, ga:pageviews',
//     'dimensions' => 'ga:yearMonth'
//     ]);

//     dd($analyticsData);
// });