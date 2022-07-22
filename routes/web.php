<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Property;
use App\Models\Representative;
use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeMailToMember;
use App\Models\Role;
use Analytics;
use Spatie\Analytics\Period;
use \PDF;
use App\Models\Bill;
use App\Models\CheckoutOption;
use Laravel\Socialite\Facades\Socialite;


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

Route::get('/', function(){
    return view('auth.login');
});

Route::get('/auth/redirect', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('facebook')->user();
});

//Routes for checkout pages
Route::group(['middleware' => []], function(){
    Route::get('/plan/{plan_id?}/checkout/{checkout_option?}/get/{discount_code?}/{username?}', [CheckoutController::class, 'show_checkout_page'])->where(['plan_id', '[1-3]', 'checkout_option', '[1-2]']);
    Route::get('/success/', [CheckoutController::class,'show_payment_success_page']);
    Route::get('/select-a-plan/', [CheckoutController::class, 'show_select_plan_page']);
    Route::get('/profile/{user}/complete',[CheckoutController::class, 'show_complete_profile_page']);
    Route::patch('/profile/{user}/complete/update',[CheckoutController::class, 'update_user_profile']);
    Route::get('/thankyou/{username?}', [CheckoutController::class, 'show_thankyou_promo_plan_page']);
    Route::get('/thankyoutrial/{username?}', [CheckoutController::class, 'show_thankyou_regular_plan_page']);
});

//routes for dashboard
Route::group(['middleware'=>['auth', 'verified']], function(){
     Route::prefix('/dashboard')->group(function(){ 
        Route::get('sales', [DashboardSalesController::class, 'index']);
        Route::get('user/{id:id}/properties', [DashboardSalesController::class, 'show']);
        Route::get('dev', [DashboardDevController::class, 'index']);
    });
});

Route::post('/subscribe', SubscribeController::class);

Route::post('/contact', ContactController::class);

Route::group(['middleware'=>['auth', 'verified']], function(){
    Route::prefix('/property/{property:uuid}')->group(function(){
    
    Route::get('units', [UnitController::class, 'index'])->name('units');
   
    Route::get('tenants', [TenantController::class, 'index'])->name('tenants');
    
    Route::get('owners', [OwnerController::class, 'index'])->name('owners');

    Route::get('bills', [BillController::class, 'index'])->name('bills');

    Route::get('payments', [AcknowledgementReceiptController::class, 'index'])->name('payments');

    Route::get('concerns', [ConcernController::class, 'index'])->name('concerns');
    
    Route::get('team', [TeamController::class, 'index'])->name('team');

    Route::get('referrals', [ReferralController::class, 'index'])->name('referrals');

    Route::get('timestamps/{date}', TimestampController::class)->name('timestamps');

    Route::get('enrollees', [EnrolleeController::class, 'index'])->name('enrollees');

    Route::get('particulars', [ParticularController::class, 'index']);

    Route::get('/', [PropertyController::class, 'show'])->name('dashboard');    
    Route::get('edit', [PropertyController::class, 'edit']);
    Route::patch('update',[PropertyController::class, 'update']);
    Route::get('delete', [PropertyController::class, 'destroy']);

    //show contracts
    Route::get('/tenant_contract', [PropertyController::class, 'show_tenant_contract']);
    Route::get('/owner_contract', [PropertyController::class, 'show_owner_contract']);

    Route::get('roles', [PropertyRoleController::class, 'index']);

    Route::get('/team/{random_str}/create', [TeamController::class, 'create']);

    Route::get('tenant/{tenant}/units/', [TenantContractController::class, 'create'])->name('tenants');

    Route::get('owner/{owner}/units/', [OwnerDeedOfSalesController::class, 'create'])->name('owners');

    Route::get('units/masterlist', UnitMasterlistController::class)->name('units'); 
    });





    Route::get('bill/{bills}', [CollectionController::class, 'create']);

    Route::get('unit/{unit}', [UnitController::class, 'show']);
    Route::get('unit/{unit}/contracts', UnitContractController::class)->name('units')->name('units');
    Route::get('unit/{unit}/deed_of_sales', UnitDeedOfSalesController::class);
    Route::get('unit/{unit}/bills', UnitBillController::class);
    Route::get('unit/{batch_no}/create', [UnitController::class, 'create'])->name('units');
    Route::post('unit/{batch_no}/store', [UnitController::class, 'store']);
    //edit multiple units
    Route::get('units/{batch_no}/edit', [UnitController::class, 'bulk_edit'])->name('units');
    //update multiple units
    Route::patch('units/{batch_no}/update', [UnitController::class, 'bulk_update']);

    //edit single unit
    Route::get('unit/{unit}/edit', [UnitController::class, 'edit'])->name('units');
    //update single unit
    Route::patch('unit/{unit}/update', [UnitController::class, 'update']);

    Route::delete('unit/{uuid:uuid}/delete', [UnitController::class, 'destroy']);
    Route::patch('unit/{batch_no}/update', [UnitController::class, 'update']);

    //edit an individual unit


    Route::post('building/{random_str}/store',[BuildingController::class, 'store']);

    Route::get('tenant/{tenant:uuid}', [TenantController::class, 'show'])->name('tenants');
    Route::get('tenant/{tenant}/contracts', [TenantContractController::class, 'index'])->name('tenants');
    //'Route::get('tenant/{tenant}/unit/{unit}/contract/units', [TenantContractController::class, 'units']);
    Route::get('tenant/{tenant}/unit/{unit}/edit', [TenantContractController::class, 'create']);
//     Route::get('tenant/{tenant}/unit/{unit}/contract/create', [TenantContractController::class, 'create']);
    Route::get('tenant/{tenant}/bills', [TenantBillController::class, 'index'])->name('tenants');
    Route::get('tenant/{tenant}/bill/create', [TenantBillController::class, 'store']);
    Route::get('tenant/{tenant}/bill/export', [TenantBillController::class, 'export']);
    Route::get('tenant/{tenant}/bill/send', [TenantBillController::class, 'send']);
    Route::get('tenant/{tenant}/collections', [TenantCollectionController::class, 'index'])->name('tenants');
    Route::get('tenant/{tenant}/collection/store', [TenantCollectionController::class, 'store']);
    Route::get('tenant/{tenant}/ar/{ar}/export', [TenantCollectionController::class, 'export']);
    Route::get('tenant/{tenant}/concerns', TenantConcernController::class)->name('tenants');
    Route::get('tenant/{tenant}/ledger', TenantLedgerController::class)->name('tenants');
    Route::get('tenant/{tenant}/edit', [TenantController::class, 'edit'])->name('tenants');
    Route::get('tenant/{uuid}/delete', [TenantController::class, 'destroy']);
    Route::patch('tenant/{tenant}/update', [TenantController::class, 'update']);
    Route::get('owner/{owner}', [OwnerController::class, 'show'])->name('owners');
    Route::get('owner/{owner}/deed_of_sales', [OwnerDeedOfSalesController::class, 'index'])->name('owners');
    Route::get('owner/{owner}/enrollees', OwnerEnrolleeController::class);
    Route::get('owner/{owner}/bills', OwnerBillController::class);
    Route::get('owner/{owner}/collections', OwnerCollectionController::class);
    Route::get('owner/{owner}/edit', [OwnerController::class, 'edit'])->name('owners');
  

    Route::get('properties', [PropertyController::class, 'index'])->name('properties');
    Route::get('property/{random_str}/create/', [PropertyController::class, 'create']);
    Route::post('property/{random_str}/store', [PropertyController::class, 'store']);

    Route::get('team/{random_str}/create', [TeamController::class, 'create']);
    Route::get('team/{user:username}/edit', [TeamController::class, 'edit']);
    Route::post('team/{random_str}/store', [TeamController::class, 'store']);
    Route::patch('team/{user:username}/update', [TeamController::class, 'update']);
    Route::delete('team/{id:id}/delete', [TeamController::class, 'destroy']);
    Route::patch('team/{random_str}/save', [TeamController::class, 'save']);

    //Creating tenant contract
    //1
    Route::get('unit/{unit}/tenant/{random_str}/new_create', NewTenantController::class)->name('tenants');
    Route::get('unit/{unit}/tenant/{random_str}/old_create', [OldTenantController::class, 'index'])->name('units');
    Route::get('tenant_sheet/export', [OldTenantController::class, 'export']);
    Route::post('unit/{unit}/tenant/{random_str}/store', [TenantController::class, 'store']);

    //2
    Route::get('unit/{unit}/tenant/{tenant}/guardian/{random_str}/create', [GuardianController::class, 'create'])->name('tenants');
    Route::get('tenant/{tenant}/guardian/{random_str}/create', [GuardianController::class,'create'])->name('tenants');
    Route::post('tenant/{tenant}/guardian/store', [GuardianController::class, 'store']);
    Route::delete('guardian/{id:id}/delete', [GuardianController::class, 'destroy']);
     Route::get('guardian/{id:id}/delete', [GuardianController::class, 'destroy']);
    //3
    Route::get('unit/{unit}/tenant/{tenant}/reference/{random_str}/create', [ReferenceController::class, 'create']);
    Route::get('tenant/{tenant}/reference/{random_str}/create', [ReferenceController::class, 'create']);
    Route::post('tenant/{tenant}/reference/store', [ReferenceController::class, 'store']);
    Route::delete('reference/{id:id}/delete', [ReferenceController::class, 'destroy']);
    Route::get('reference/{id:id}/delete', [ReferenceController::class, 'destroy']);
    //4
    Route::get('unit/{unit}/tenant/{tenant}/contract/{random_str}/create', [ContractController::class, 'create']);
    Route::post('unit/{unit}/tenant/{tenant}/contract/{random_str}/store', [ContractController::class, 'store']);
    Route::get('/contract/{contract}/edit', [ContractController::class, 'edit']);
    Route::get('/contract/{contract}/preview', [ContractController::class, 'preview']);
    Route::patch('/contract/{contract}/update', [ContractController::class, 'update']);
    //5
    Route::get('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/create', [BillController::class, 'create']);
    Route::post('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/store', [BillController::class,'store']);
    Route::delete('bill/{id:id}/delete', [BillController::class, 'destroy']);

    Route::post('bill/{uuid:uuid}/store/{bill_count}/express',[ PropertyBillExpressController::class, 'store']);

    Route::get('bill/{uuid:uuid}/express/batch/{batch_no}', [PropertyBillExpressController::class], 'index');
     
    Route::post('bill/{uuid:uuid}/store/{bill_count}/customized', [PropertyBillCustomizedController::class, 'store']);

    Route::get('bill/{uuid:uuid}/customized/batch/{batch_no}', [PropertyBillCustomizedController::class, 'edit'])->name('bills');

    Route::patch('bill/{uuid:uuid}/customized/batch/{batch_no}', [PropertyBillCustomizedController::class, 'update']);
    //4
 
    //Creating owner contract
    //1
    Route::get('unit/{unit}/owner/{random_str}/create', [OwnerController::class, 'create'])->name('units');
    Route::post('unit/{unit}/owner/{random_str}/store', [OwnerController::class, 'store']);
    //2
    Route::get('unit/{unit}/owner/{owner}/deed_of_sale/{random_str}/create', [DeedOfSaleController::class,'create'])->name('units');
    Route::post('unit/{unit}/owner/{owner}/deed_of_sale/{random_str}/store',[DeedOfSaleController::class,'store']);
    //3
    Route::get('unit/{unit}/owner/{owner}/representative/{random_str}/create', [RepresentativeController::class,'create'])->name('units');
    Route::get('owner/{owner}/representative/{random_str}/create', [RepresentativeController::class,'create'])->name('units');
    Route::post('unit/{unit}/owner/{owner}/representative/{random_str}/store',[RepresentativeController::class,'store']);
    Route::delete('representative/{id:id}/delete', [RepresentativeController::class, 'destroy']);
    ///4
    Route::get('unit/{unit}/owner/{owner}/bank/{random_str}/create', [BankController::class, 'create'])->name('units');
    Route::get('/owner/{owner}/bank/{random_str}/create', [BankController::class,'create'])->name('units');
    Route::post('unit/{unit}/owner/{owner}/bank/{random_str}/store', [BankController::class,'store']);
    Route::delete('bank/{id:id}/delete', [BankController::class, 'destroy']);
    Route::delete('bank/{id:id}/delete', [BankController::class, 'destroy']);
    //4
    Route::get('unit/{unit}/owner/{owner}/enrollee/{random_str}/create', [EnrolleeController::class, 'create'])->name('units');
    Route::post('unit/{unit}/owner/{owner}/enrollee/{random_str}/store', [EnrolleeController::class, 'store']);
    //3
    
    Route::get('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/create', [BillController::class,
    'create']);
    Route::post('unit/{unit}/tenant/{tenant}/contract/{contract}/bill/{random_str}/store',
    [BillController::class,'store']);
    Route::delete('bill/{id:id}/delete', [BillController::class, 'destroy']);

    
    Route::patch('/profile/{user}/update',[UserController::class, 'update']);
    Route::get('/profile/{user}/edit',[UserController::class, 'edit'])->name('profile');

    Route::get('/profile/{username:username}/point',[PointController::class, 'index'])->name('point');

    Route::post('/particular/{random_str}/store', [ParticularController::class, 'store']);
    Route::get('/particular/{random_str}/create', [ParticularController::class, 'create']);

    Route::get('/particular/{random_str}/store', [ParticularController::class, 'store']);

    Route::get('/documentation', [DocumentationController::class, 'index'])->name('documentation');

    Route::get('/contract/{contract}/moveout', MoveoutContractController::class)->name('tenants');
    
    Route::get('/contract/{contract}/moveout/bills', MoveoutContractBillController::class)->name('tenants');

   Route::get('/contract/{contract}/renew', RenewContractController::class)->name('tenants');

    Route::get('/contract/{contract}/export', ContractExportController::class);

    Route::get('/contract/{contract}/signed_contract', ExportSignedContractController::class);

    Route::get('/contract/{contract}/transfer', TransferContractController::class)->name('tenants');

    Route::get('/tenant/{tenant}/new_contract', NewContractController::class)->name('tenants');

    Route::get('/leasing/{enrollee}/pullout', [EnrolleeController::class, 'update']);

   Route::get('data', function(){
        //retrieve visitors and pageview data for the current day and the last seven days
        //$analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(2));

        //retrieve visitors and pageviews since the 6 months ago
        //$analyticsData = Analytics::fetchVisitorsAndPageViews(Period::months(6));

        //retrieve sessions and pageviews with yearMonth dimension since 1 year ago
        $analyticsData = Analytics::performQuery(
        Period::years(1),
        'ga:sessions',
        [
        'metrics' => 'ga:sessions, ga:pageviews',
        'dimensions' => 'ga:yearMonth'
        ]
        );
        dd($analyticsData);
   });

});
