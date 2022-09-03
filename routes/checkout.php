<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

// Route::group(['middleware' => []], function(){
    Route::get('/plan/{plan_id?}/checkout/{checkout_option?}/get/{discount_code?}/{username?}', [CheckoutController::class,'show_checkout_page'])->where(['plan_id', '[1-3]', 'checkout_option', '[1-2]']);
    Route::get('/success/{username}/{amount}', [CheckoutController::class,'show_payment_success_page']);
    Route::get('/select-a-plan/', [CheckoutController::class, 'show_select_plan_page']);
    Route::get('/select-a-plan-free/', [CheckoutController::class, 'show_select_plan_free_page']);
    Route::get('/profile/{user}/complete',[CheckoutController::class, 'show_complete_profile_page']);
    Route::patch('/profile/{user}/complete/update',[CheckoutController::class, 'update_user_profile']);
    Route::get('/thankyou/', [CheckoutController::class, 'show_thankyou_promo_plan_page']);
    Route::get('/thankyoutrial/', [CheckoutController::class, 'show_thankyou_regular_plan_page']);


    Route::get('/privacy-policy', [CheckoutController::class, 'show_privacy_policy']);
    Route::get('/terms-of-service', [CheckoutController::class, 'show_terms_of_service']);

// });