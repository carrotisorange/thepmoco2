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
            return (auth()->user()->role_id === 1) || (auth()->user()->username === 'pamelatecson' ||
            (auth()->user()->username ===
            'nc_manager') || auth()->user()->role_id === 5 );
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
            return (auth()->user()->role_id === 5) || (auth()->user()->username === 'pamelatecson');
        });

        Gate::define('unitowner', function(User $user){
            return auth()->user()->role_id === 7;
        });

        Gate::define('tenant', function(User $user){
            return auth()->user()->role_id === 8;
        });

        Gate::define('manager', function(User $user){
            return (auth()->user()->role_id === 9) || (auth()->user()->username ===
            'landley' || (auth()->user()->username === 'nc_admin')||
            auth()->user()->role_id === 5 );
        });

        Gate::define('managerandadmin', function(User $user){
            return (auth()->user()->role_id === 1) || (auth()->user()->role_id === 9) || (auth()->user()->username ===
            'landley' || auth()->user()->role_id ===  5);
        });

          Gate::define('accountownerandmanager', function(User $user){
          return (auth()->user()->role_id === 5) || (auth()->user()->role_id === 9) || (auth()->user()->username ===
          'landley' );
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

        Gate::define('porforlio', function (User $user){
            return (auth()->user()->is_portforlio_unlocked == '0' && auth()->user()->user_type == '1');
        });

        Gate::define('contract', function (User $user){
            return (auth()->user()->is_contract_unlocked == "0" && auth()->user()->user_type == '1');
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

        Gate::define('accountpayable', function (User $user){
            return (auth()->user()->is_accountpayable_unlocked == '0' && auth()->user()->user_type == '1');
        });

        Gate::define('accountreceivable', function (User $user){
            return (auth()->user()->is_accountreceivable_unlocked == '0' && auth()->user()->user_type == '1');
        });
    }
}
