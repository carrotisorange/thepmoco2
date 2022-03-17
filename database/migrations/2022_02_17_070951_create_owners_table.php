<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->uuid('uuid');
            $table->string('owner');
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('photo_id');
            $table->foreignId('bank_id')->constrained();

            $table->string('occupation')->nullable();
            $table->string('employer')->nullable();
            $table->string('employer_address')->nullable();

            $table->foreignId('country_id')->constrained()->nullable();
            $table->foreignId('city_id')->constrained()->nullable();
            $table->foreignId('province_id')->constrained()->nullable();
            $table->foreignId('barangay_id')->constrained()->nullable();
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
        Schema::dropIfExists('owners');
    }
}
