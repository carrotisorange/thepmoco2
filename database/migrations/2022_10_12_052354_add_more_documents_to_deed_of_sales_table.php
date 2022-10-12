<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreDocumentsToDeedOfSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deed_of_sales', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('tax_declaration')->nullable();
            $table->string('deed_of_sales')->nullable();
            $table->string('contract_to_sell')->nullable();
            $table->string('certificate_of_membership')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deed_of_sales', function (Blueprint $table) {
            //
        });
    }
}
