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
            $table->uuid('uuid')->unique();
            $table->string('tenant');
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->date('birthdate');
            $table->string('civil_status');
            $table->string('photo_id');
            $table->string('gender');

            $table->foreignId('country_id')->nullable()->constrained();
            $table->foreignId('city_id')->nullable()->constrained();
            $table->foreignId('province_id')->nullable()->constrained();
            $table->foreignId('barangay_id')->nullable()->constrained();
            $table->foreignUuid('property_uuid')->constrained();
            
            $table->string('type');
            $table->string('course')->nullable();
            $table->string('year_level')->nullable();
            $table->string('school')->nullable();
            $table->string('school_address')->nullable();

            $table->string('occupation')->nullable();
            $table->string('employer')->nullable();
            $table->string('employer_address')->nullable();

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
