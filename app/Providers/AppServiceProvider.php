<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Session;
use App\Models\Feature;
use App\Models\UserRestriction;

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

        Gate::define('admin', function(){
            return (Session::get('role_id') === 1) || Session::get('role_id') === 5;
        });

         Gate::define('ancillary', function(){
            return Session::get('role_id') === 14 || Session::get('role_id') === 5;
        });

        Gate::define('billing', function(){
            return (Session::get('role_id') === 2 || Session::get('role_id') === 5 );
        });

        Gate::define('treasury', function(){
            return (Session::get('role_id') === 3 || Session::get('role_id') === 5 );
        });

        Gate::define('accountpayable', function(){
            return (Session::get('role_id') === 4 || Session::get('role_id') === 5 );
        });

        Gate::define('accountowner', function(){
            return (Session::get('role_id') === 5);
        });

        Gate::define('unitowner', function(){
            return Session::get('role_id') === 7;
        });

        Gate::define('tenant', function(){
            return Session::get('role_id') === 8;
        });

        Gate::define('manager', function(){
            return Session::get('role_id') === 9;
        });

        Gate::define('managerandadmin', function(){
            return Session::get('role_id') === 1 || Session::get('role_id') === 9 || Session::get('role_id') ===  5;
        });

        Gate::define('accountownerandmanager', function(){
          return Session::get('role_id') === 5 || Session::get('role_id') === 9;
        });

        Gate::define('dev', function(){
            return (Session::get('role_id') == '10');
        });

        Gate::define('old', function (){
            return (auth()->user()->user_type == '0');
        });

        Gate::define('new', function (){
            return (auth()->user()->user_type == '1');
        });

        // $userRestrictionsCount = UserRestriction:: where('property_uuid', Session::get('property_uuid')) ->where('user_id', auth()->user()->id)->count();

        // for($i =1; $i<=$userRestrictionsCount; $i++){
          
        // }

        Gate::define('create_rfp', function (){
            return (UserRestriction::
            where('property_uuid', Session::get('property_uuid'))
            ->where('user_id', auth()->user()->id)
            ->where('feature_id', 13)
            ->where('restriction_id', 1)
            ->pluck('is_approved')
            ->first() === 0);
        });
    }
    
}
