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
            return (auth()->user()->role_id === 1) || (auth()->user()->username === 'pamelatecson');
        });

        Gate::define('billing', function(User $user){
            return auth()->user()->role_id === 2;
        });

        Gate::define('treasury', function(User $user){
            return auth()->user()->role_id === 3;
        });

        Gate::define('accountpayable', function(User $user){
            return auth()->user()->role_id === 4;
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
            'landley');
        });

        Gate::define('managerandadmin', function(User $user){
            return (auth()->user()->role_id === 1) || (auth()->user()->role_id === 9) || (auth()->user()->username ===
            'landley');
        });

        Gate::define('dev', function(User $user){
            return (auth()->user()->role_id === 10);
        });
    }
}
