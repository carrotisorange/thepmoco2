<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsInBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('no_of_guests')->nullable();
            $table->string('vehicle_details')->nullable();
            $table->string('plate_number')->nullable();
            $table->longText('special_request')->nullable();
            $table->longText('flight_itinerary')->nullable();
            $table->date('arrival_date')->nullable();
            $table->date('departure_date')->nullable();
            $table->time('arrival_time')->nullable();
            $table->time('departure_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
}
