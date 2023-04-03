<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_guests', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('guest_uuid')->constrained();
            $table->string('additional_guest');
            $table->date('birthdate')->nullable();
            $table->boolean('has_disability')->default(0);
            $table->longText('disability')->nullable();
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
        Schema::dropIfExists('additional_guests');
    }
}
