<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsCommonColumnParticularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('particulars', function (Blueprint $table) {
            $table->boolean('is_common')->nullable()->default(0);
            // $table->boolean('for_tenant')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('particulars', function (Blueprint $table) {
            //
        });
    }
}
