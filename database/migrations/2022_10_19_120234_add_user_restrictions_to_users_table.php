<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserRestrictionsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_portfolio_create_allowed');
            $table->boolean('is_portfolio_read_allowed');
            $table->boolean('is_portfolio_update_allowed');
            $table->boolean('is_portfolio_delete_allowed');

             $table->boolean('is_contract_create_allowed');
             $table->boolean('is_contract_read_allowed');
             $table->boolean('is_contract_update_allowed');
             $table->boolean('is_contract_delete_allowed');

            $table->boolean('is_concern_create_allowed');
            $table->boolean('is_concern_read_allowed');
            $table->boolean('is_concern_update_allowed');
            $table->boolean('is_concern_delete_allowed');

            $table->boolean('is_tenant_portal_create_allowed');
            $table->boolean('is_tenant_portal_read_allowed');
            $table->boolean('is_tenant_portal_update_allowed');
            $table->boolean('is_tenant_portal_delete_allowed');

            $table->boolean('is_owner_portal_create_allowed');
            $table->boolean('is_owner_portal_read_allowed');
            $table->boolean('is_owner_portal_update_allowed');
            $table->boolean('is_owner_portal_delete_allowed');

            $table->boolean('is_account_payable_create_allowed');
            $table->boolean('is_account_payable_read_allowed');
            $table->boolean('is_account_payable_update_allowed');
            $table->boolean('is_account_payable_delete_allowed');

            $table->boolean('is_account_receivable_create_allowed');
            $table->boolean('is_account_receivable_read_allowed');
            $table->boolean('is_account_receivable_update_allowed');
            $table->boolean('is_account_receivable_delete_allowed');
            
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
