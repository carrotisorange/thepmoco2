<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_owners', function (Blueprint $table) {
    $table->id('id');
          $table->string('house_owner');
          $table->string('email')->unique()->nullable();
          $table->string('mobile_number')->nullable();
          $table->date('birthdate')->nullable();
          $table->string('gender');
          $table->string('civil_status');
          $table->string('photo_id')->nullable();

          $table->string('occupation')->nullable();
          $table->string('employer')->nullable();
          $table->string('employer_address')->nullable();

          $table->foreignId('country_id')->constrained()->nullable();
          $table->foreignUuid('property_uuid')->constrained()->nullable();
          $table->foreignId('city_id')->constrained()->nullable();
          $table->foreignId('province_id')->constrained()->nullable();
          $table->longText('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_owners');
    }
}
