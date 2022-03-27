<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('property');
            $table->longText('description')->nullable();
            $table->string('status');
            $table->string('thumbnail');
            $table->foreignId('type_id')->constrained();
            $table->string('tenant_contract')->nullable();
            $table->string('owner_contract')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
