<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->date('birthdate');
            $table->string('civil_status');
            $table->string('photo_id');
            $table->string('gender');

            $table->foreignId('country_id')->constrained()->nullable();
            $table->foreignId('city_id')->constrained()->nullable();
            $table->foreignId('province_id')->constrained()->nullable();
            $table->foreignId('barangay_id')->constrained()->nullable();
            
            $table->string('type');
            $table->string('course')->nullable();
            $table->string('year_level')->nullable();
            $table->string('school')->nullable();
            $table->string('school_address')->nullable();

            $table->string('occupation')->nullable();
            $table->string('employer')->nullable();
            $table->string('employer_address')->nullable();

            $table->foreignId('reference_id')->constrained();
            $table->foreignId('guardian_id')->constrained();

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
        Schema::dropIfExists('tenants');
    }
}
