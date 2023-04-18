<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
        
        Schema::defaultStringLength(191);

        Gate::define('admin', function(User $user){
            return (auth()->user()->role_id === 1) || auth()->user()->role_id === 5;
        });

         Gate::define('ancillary', function(User $user){
            return auth()->user()->role_id === 14 || auth()->user()->role_id === 5;
        });

        Gate::define('billing', function(User $user){
            return (auth()->user()->role_id === 2 || auth()->user()->role_id === 5 );
        });

        Gate::define('treasury', function(User $user){
            return (auth()->user()->role_id === 3 || auth()->user()->role_id === 5 );
        });

        Gate::define('accountpayable', function(User $user){
            return (auth()->user()->role_id === 4 || auth()->user()->role_id === 5 );
        });

        Gate::define('accountowner', function(User $user){
            return (auth()->user()->role_id === 5);
        });

        Gate::define('unitowner', function(User $user){
            return auth()->user()->role_id === 7;
        });

        Gate::define('tenant', function(User $user){
            return auth()->user()->role_id === 8;
        });

        Gate::define('manager', function(User $user){
            return auth()->user()->role_id === 9;
        });

        Gate::define('managerandadmin', function(User $user){
            return auth()->user()->role_id === 1 || auth()->user()->role_id === 9 || auth()->user()->role_id ===  5;
        });

        Gate::define('accountownerandmanager', function(User $user){
          return auth()->user()->role_id === 5 || auth()->user()->role_id === 9;
        });

        Gate::define('dev', function(User $user){
            return (auth()->user()->role_id == '10');
        });

        Gate::define('old', function (User $user){
            return (auth()->user()->user_type == '0');
        });

        Gate::define('new', function (User $user){
            return (auth()->user()->user_type == '1');
        });

        Gate::define('portfolio', function (User $user){
            return (auth()->user()->is_portfolio_unlocked == '0' && auth()->user()->user_type == '1');
        });

        Gate::define('contract', function (User $user){
            return (auth()->user()->is_contract_unlocked == '0' && auth()->user()->user_type == '1');
        });

        Gate::define('concern', function (User $user){
            return (auth()->user()->is_concern_unlocked == '0' && auth()->user()->user_type == '1');
        });

        Gate::define('tenantportal', function (User $user){
            return (auth()->user()->is_tenantportal_unlocked == '0' && auth()->user()->user_type == '1');
        });

        Gate::define('ownerportal', function (User $user){
            return (auth()->user()->is_ownerportal_unlocked == '0' && auth()->user()->user_type == '1');
        });

        Gate::define('accountreceivable', function (User $user){
            return (auth()->user()->is_accountreceivable_unlocked == '0' && auth()->user()->user_type == '1');
        });

        //set user restrictions
        //access to portfolio
        Gate::define('is_portfolio_create_allowed', function (User $user){
            return (auth()->user()->is_portfolio_create_allowed == '1');
        });
        
        Gate::define('is_portfolio_read_allowed', function (User $user){
            return (auth()->user()->is_portfolio_read_allowed == '1');
        });

        Gate::define('is_portfolio_update_allowed', function (User $user){
            return (auth()->user()->is_portfolio_update_allowed == '1');
        });

        Gate::define('is_portfolio_delete_allowed', function (User $user){
            return (auth()->user()->is_portfolio_delete_allowed == '1');
        });

        //access to contract
        Gate::define('is_contract_create_allowed', function (User $user){
            return (auth()->user()->is_contract_create_allowed == '1');
        });
        
        Gate::define('is_contract_read_allowed', function (User $user){
            return (auth()->user()->is_contract_read_allowed == '1');
        });

        Gate::define('is_contract_update_allowed', function (User $user){
            return (auth()->user()->is_contract_update_allowed == '1');
        });

        Gate::define('is_contract_delete_allowed', function (User $user){
            return (auth()->user()->is_contract_delete_allowed == '1');
        });

        //access to concern
        Gate::define('is_concern_create_allowed', function (User $user){
            return (auth()->user()->is_concern_create_allowed == '1');
        });
        
        Gate::define('is_concern_read_allowed', function (User $user){
            return (auth()->user()->is_concern_read_allowed == '1');
        });

        Gate::define('is_concern_update_allowed', function (User $user){
            return (auth()->user()->is_concern_update_allowed == '1');
        });

        Gate::define('is_concern_delete_allowed', function (User $user){
            return (auth()->user()->is_concern_delete_allowed == '1');
        });

        //access to tenant portal
        Gate::define('is_tenant_portal_create_allowed', function (User $user){
            return (auth()->user()->is_tenant_portal_create_allowed == '1');
        });
        
        Gate::define('is_tenant_portal_read_allowed', function (User $user){
            return (auth()->user()->is_tenant_portal_read_allowed == '1');
        });

        Gate::define('is_tenant_portal_update_allowed', function (User $user){
            return (auth()->user()->is_tenant_portal_update_allowed == '1');
        });

        Gate::define('is_tenant_portal_delete_allowed', function (User $user){
            return (auth()->user()->is_tenant_portal_delete_allowed == '1');
        });

        //access to owner portal
        Gate::define('is_owner_portal_create_allowed', function (User $user){
            return (auth()->user()->is_owner_portal_create_allowed == '1');
        });
        
        Gate::define('is_owner_portal_read_allowed', function (User $user){
            return (auth()->user()->is_owner_portal_read_allowed == '1');
        });

        Gate::define('is_owner_portal_update_allowed', function (User $user){
            return (auth()->user()->is_owner_portal_update_allowed == '1');
        });

        Gate::define('is_owner_portal_delete_allowed', function (User $user){
            return (auth()->user()->is_owner_portal_delete_allowed == '1');
        });

        //access to account payable 
        Gate::define('is_account_payable_create_allowed', function (User $user){
            return (auth()->user()->is_account_payable_create_allowed == '1');
        });
        
        Gate::define('is_account_payable_read_allowed', function (User $user){
            return (auth()->user()->is_account_payable_read_allowed == '1');
        });

        Gate::define('is_account_payable_update_allowed', function (User $user){
            return (auth()->user()->is_account_payable_update_allowed == '1');
        });

        Gate::define('is_account_payable_delete_allowed', function (User $user){
            return (auth()->user()->is_account_payable_delete_allowed == '1');
        });

        //access to account payable 
        Gate::define('is_account_receivable_create_allowed', function (User $user){
            return (auth()->user()->is_account_receivable_create_allowed == '1');
        });
        
        Gate::define('is_account_receivable_read_allowed', function (User $user){
            return (auth()->user()->is_account_receivable_read_allowed == '1');
        });

        Gate::define('is_account_receivable_update_allowed', function (User $user){
            return (auth()->user()->is_account_receivable_update_allowed == '1');
        });

        Gate::define('is_account_receivable_delete_allowed', function (User $user){
            return (auth()->user()->is_account_receivable_delete_allowed == '1');
        });
    }
    
}
