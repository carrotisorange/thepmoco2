<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignUuid('unit_uuid')->constrained();
            $table->foreignUuid('property_uuid')->constrained();
            $table->double('current_reading');
            $table->double('previous_reading');
            $table->double('total_amount_due');
            $table->date('start_date');
            $table->date('end_date');
            $table->double('kwh');
            $table->double('min_charge');
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
        Schema::dropIfExists('utilities');
    }
}
