<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_stats', function (Blueprint $table) {
            $table->id();
            $table->integer('total');
            $table->integer('vacant');
            $table->integer('occupied');
            $table->integer('dirty');
            $table->integer('reserved');
            $table->integer('under_maintenance');
            $table->integer('pending');
            $table->foreignUuid('property_uuid');
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
        Schema::dropIfExists('unit_stats');
    }
}
