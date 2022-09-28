<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRestrictionsColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_portforlio_unlocked');
            $table->boolean('is_contract_unlocked');
            $table->boolean('is_concern_unlocked');
            $table->boolean('is_tenantportal_unlocked');
            $table->boolean('is_ownerportal_unlocked');
            $table->boolean('is_accountpayable_unlocked');
            $table->boolean('is_accountreceivable_unlocked');
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
