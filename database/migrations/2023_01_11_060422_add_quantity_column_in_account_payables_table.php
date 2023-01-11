<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuantityColumnInAccountPayablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_payables', function (Blueprint $table) {
            $table->double('quantity', 5)->nullable();
            $table->string('selected_quotation')->nullable();
            $table->string('vendor')->nullable();
            $table->longText('comment')->nullable();
            $table->longText('comment2')->nullable();
            $table->date('delivery_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_payables', function (Blueprint $table) {
            //
        });
    }
}
