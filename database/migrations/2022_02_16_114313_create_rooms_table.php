<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room');
            $table->double('price', 15, 2);
            $table->foreignId('status_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('building_id')->constrained();
            $table->foreignId('floor_id')->constrained();
            $table->foreignId('property_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->double('discount', 15, 2);
            $table->double('dimensions', 15, 2);
            $table->string('thumbnail');
            $table->string('slug');
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
        Schema::dropIfExists('rooms');
    }
}
