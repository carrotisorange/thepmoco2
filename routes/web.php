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


Route::get('/portfolio', function(){
    return view('newlayout.portfolio');
});

//tenant portal
Route::get('/tenantdashboard', function(){
    return view('newlayout.tenant_portal.tenantdashboard');
});

Route::get('/tenantcontracts', function(){
    return view('newlayout.tenant_portal.tenantcontracts');
});

Route::get('/tenantbills', function(){
    return view('newlayout.tenant_portal.tenantbills');
});

Route::get('/tenantpayments', function(){
    return view('newlayout.tenant_portal.tenantpayments');
});

Route::get('/tenantconcerns', function(){
    return view('newlayout.tenant_portal.tenantconcerns');
});

Route::get('/tenantrequest', function(){
    return view('newlayout.tenant_portal.tenantrequest');
});

Route::get('/tenantbills_detail', function(){
    return view('newlayout.tenant_portal.tenantbills_detail');
});

Route::get('/close-concern', function(){
    return view('newlayout.tenant_portal.close-concern');
});

Route::get('/concern-view', function(){
    return view('newlayout.tenant_portal.concern-view');
});

Route::get('/check-page', function(){
    return view('newlayout.unlock.check-page');
});

Route::get('/oops-page', function(){
    return view('newlayout.unlock.oops-page');
});

Route::get('/sample-profile-lock', function(){
    return view('newlayout.unlock.sample-profile-lock');
});

Route::get('/contract-lock', function(){
    return view('newlayout.unlock.contract-lock');
});

Route::get('/concern-lock', function(){
    return view('newlayout.unlock.concern-lock');
});

Route::get('/payable-lock', function(){
    return view('newlayout.unlock.payable-lock');
});

Route::get('/portfolio-lock', function(){
    return view('newlayout.unlock.portfolio-lock');
});

Route::get('/tenant-portal-lock', function(){
    return view('newlayout.unlock.tenant-portal-lock');
});

Route::get('/owner-portal-lock', function(){
    return view('newlayout.unlock.owner-portal-lock');
});

Route::get('/receivable-bills-lock', function(){
    return view('newlayout.unlock.receivable-bills-lock');
});

Route::get('/receivable-payments-lock', function(){
    return view('newlayout.unlock.receivable-payments-lock');
});







// admin portal
Route::get('/newsignin', function(){
    return view('newlayout.newsignin');
});

Route::get('/newsignup', function(){
    return view('newlayout.newsignup');
});

Route::get('/signup_thanks', function(){
    return view('newlayout.signup_thanks');
});

Route::get('/createproperty', function(){
    return view('newlayout.createproperty');
});

Route::get('/units-list', function(){
    return view('newlayout.admin_units.units-list');
});

Route::get('/units-thumbnail', function(){
    return view('newlayout.admin_units.units-thumbnail');
});

Route::get('/newunits_detail', function(){
    return view('newlayout.admin_units.newunits_detail');
});

Route::get('/newunits_rent', function(){
    return view('newlayout.admin_units.newunits_rent');
});

Route::get('/newunits_owner', function(){
    return view('newlayout.admin_units.newunits_owner');
});

Route::get('/newunits_rooms', function(){
    return view('newlayout.admin_units.newunits_rooms');
});

Route::get('/newunits_furniture', function(){
    return view('newlayout.admin_units.newunits_furniture');
});

Route::get('/owner-page', function(){
    return view('newlayout.admin_owner.owner-page');
});

Route::get('/admindashboard', function(){
    return view('newlayout.admin_dashboard.admindashboard');
});

Route::get('/portfolio-dashboard', function(){
    return view('newlayout.admin_dashboard.portfolio-dashboard');
});

Route::get('/newdashboard', function(){
    return view('newlayout.admin_dashboard.newdashboard');
});

Route::get('/success_property', function(){
    return view('newlayout.success_property');
});

Route::get('/owner-profile', function(){
    return view('newlayout.admin_owner.owner-profile');
});

Route::get('/tenant-page', function(){
    return view('newlayout.admin_tenant.tenant-page');
});

Route::get('/employees', function(){
    return view('newlayout.admin_employee.employees');
});

Route::get('/tenant-profile', function(){
    return view('newlayout.admin_tenant.tenant-profile');
});

Route::get('/change-username', function(){
    return view('newlayout.admin_tenant.change-username');
});

Route::get('/change-password', function(){
    return view('newlayout.admin_tenant.change-password');
});

Route::get('/bills-page', function(){
    return view('newlayout.admin_bills.bills-page');
});

Route::get('/aging-summary', function(){
    return view('newlayout.admin_bills.aging-summary');
});

Route::get('/unpaid', function(){
    return view('newlayout.admin_bills.unpaid');
});

Route::get('/paid-list', function(){
    return view('newlayout.admin_bills.paid-list');
});

Route::get('/partially', function(){
    return view('newlayout.admin_bills.partially');
});



Route::get('/addtenant1', function(){
    return view('newlayout.admin_tenant.addtenant1');
});

Route::get('/addtenant2', function(){
    return view('newlayout.admin_tenant.addtenant2');
});

Route::get('/addtenant3', function(){
    return view('newlayout.admin_tenant.addtenant3');
});

Route::get('/addtenant4', function(){
    return view('newlayout.admin_tenant.addtenant4');
});

Route::get('/addtenant5', function(){
    return view('newlayout.admin_tenant.addtenant5');
});

Route::get('/tenant-success', function(){
    return view('newlayout.admin_tenant.tenant-success');
});

Route::get('/addowner1', function(){
    return view('newlayout.admin_owner.addowner1');
});

Route::get('/addowner2', function(){
    return view('newlayout.admin_owner.addowner2');
});

Route::get('/addowner3', function(){
    return view('newlayout.admin_owner.addowner3');
});

Route::get('/addowner4', function(){
    return view('newlayout.admin_owner.addowner4');
});

Route::get('/addowner5', function(){
    return view('newlayout.admin_owner.addowner5');
});

Route::get('/owner-success', function(){
    return view('newlayout.admin_owner.owner-success');
});


Route::get('/cashflow', function(){
    return view('newlayout.cashflow');
});

Route::get('/settings-page', function(){
    return view('newlayout.settings-page');
});

Route::get('/individual-concern', function(){
    return view('newlayout.admin_concerns.individual-concern');
});

Route::get('/concern-page-list', function(){
    return view('newlayout.admin_concerns.concern-page-list');
});

Route::get('/payments-page', function(){
    return view('newlayout.admin_collection.payments-page');
});

Route::get('/payment-request', function(){
    return view('newlayout.admin_collection.payment-request');
});


Route::get('/accountspayables1', function(){
    return view('newlayout.admin_payable.accountspayables1');
});

Route::get('/accountspayables2', function(){
    return view('newlayout.admin_payable.accountspayables2');
});

Route::get('/pending-account', function(){
    return view('newlayout.pending-account');
});


Route::get('/accounts-payable-list', function(){
    return view('newlayout.admin_payable.accounts-payable-list');
});

Route::get('/accounts-all', function(){
    return view('newlayout.admin_payable.accounts-all');
});


// owner portal
Route::get('/ownerdashboard', function(){
    return view('newlayout.owner_portal.ownerdashboard');
});

Route::get('/ownerunits', function(){
    return view('newlayout.owner_portal.ownerunits');
});

Route::get('/ownerbills', function(){
    return view('newlayout.owner_portal.ownerbills');
});

Route::get('/ownerbills_detail', function(){
    return view('newlayout.owner_portal.ownerbills_detail');
});


Route::get('/ownerpayment', function(){
    return view('newlayout.owner_portal.ownerpayment');
});

Route::get('/ownerconcern', function(){
    return view('newlayout.owner_portal.ownerconcern');
});

Route::get('/add-units-modal', function(){
    return view('newlayout.admin_units.add-units-modal');
});

Route::get('/create-individual-bill', function(){
    return view('newlayout.admin_bills.create-individual-bill');
});

Route::get('/createbills', function(){
    return view('newlayout.admin_bills.createbills');
});


Route::get('/individual-bills', function(){
    return view('newlayout.admin_bills.individual-bills');
});

Route::get('/unitbillshistory', function(){
    return view('newlayout.admin_bills.unitbillshistory');
});

Route::get('/paymenthistory', function(){
    return view('newlayout.admin_collection.paymenthistory');
});

Route::get('/paybills', function(){
    return view('newlayout.admin_bills.paybills');
});

Route::get('/addemployee', function(){
    return view('newlayout.admin_employee.addemployee');
});

Route::get('/dashboard_moveout', function(){
    return view('newlayout.admin_dashboard.dashboard_moveout');
});

Route::get('/dashboard_payment', function(){
    return view('newlayout.admin_dashboard.dashboard_payment');
});

Route::get('/notifications', function(){
    return view('newlayout.admin_dashboard.notifications');
});

Route::get('/contracts-page-list', function(){
    return view('newlayout.admin_contracts.contracts-page-list');
});

Route::get('/renew-request', function(){
    return view('newlayout.admin_contracts.renew-request');
});

Route::get('/renew-page', function(){
    return view('newlayout.admin_contracts.renew-page');
});

Route::get('/moveout-request', function(){
    return view('newlayout.admin_contracts.moveout-request');
});

Route::get('/moveout-page', function(){
    return view('newlayout.admin_contracts.moveout-page');
});

Route::get('/sample-contract', function(){
    return view('newlayout.admin_contracts.sample-contract');
});


Route::get('/banner', function(){
    return view('newlayout.banner');
});

Route::get('/terms', function(){
    return view('newlayout.terms');
});

Route::get('/privacy', function(){
    return view('newlayout.privacy');
});


Route::get('/landingpage', function(){
    return view('landing.landingpage');
});

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

Route::get('/plans', function(){
    return view('landing.plans');
});

Route::get('/home', function(){
    return view('kommunal.home');
});

Route::get('/search', function(){
    return view('kommunal.search
');
});

Route::get('/catalog', function(){
    return view('kommunal.catalog');
});
























