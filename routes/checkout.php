<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

Route::middleware('auth')->group(function () {
    Route::controller(PropertyController::class)->group(function () {
        Route::get('/plan/{plan_id?}/checkout/{checkout_option?}/get/{discount_code?}/{username?}','show_checkout_page')->where(['plan_id', '[1-3]', 'checkout_option', '[1-2]']);
        Route::get('/success/{amount}','show_payment_success_page');
        Route::get('/select-a-plan-free/', 'show_select_plan_free_page');
        Route::get('/profile/{user}/complete', 'show_complete_profile_page');
        Route::patch('/profile/{user}/complete/update','update_user_profile');
        Route::get('/thankyou/', 'show_thankyou_promo_plan_page');
        Route::get('/thankyoutrial/','show_thankyou_regular_plan_page');
        Route::get('/privacy-policy','show_privacy_policy');
        Route::get('/terms-of-service','show_terms_of_service');
    });
});

  Route::get('/select-a-plan/', [CheckoutController::class, 'show_select_plan_page']);
