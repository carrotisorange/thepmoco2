<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('unit');
            $table->double('rent', 15, 2);
            $table->foreignId('status_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('building_id')->nullable()->constrained();
            $table->foreignId('floor_id')->nullable()->constrained();
            $table->foreignUuid('property_uuid')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('batch_no');
            $table->boolean('is_enrolled');
            $table->double('discount', 15, 2);
            $table->double('size');
            $table->integer('occupancy');
            $table->string('thumbnail');
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
        Schema::dropIfExists('units');
    }
}
