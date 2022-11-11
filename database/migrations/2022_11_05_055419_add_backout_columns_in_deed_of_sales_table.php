<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBackoutColumnsInDeedOfSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deed_of_sales', function (Blueprint $table) {
            $table->timestamp('backout_at')->nullable();
            $table->string('backout_reason')->nullable();
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
