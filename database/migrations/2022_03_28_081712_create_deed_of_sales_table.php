<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeedOfSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deed_of_sales', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->foreignUuid('owner_uuid')->constrained();
            $table->foreignUuid('unit_uuid')->constrained();
            $table->double('price');
            $table->string('classification');
            $table->date('turnover_at');
            $table->string('status');
            $table->string('contract');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deed_of_sales');
    }
}
