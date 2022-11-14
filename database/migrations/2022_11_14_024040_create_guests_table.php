<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->string('guest');
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->string('status');
            $table->foreignUuid('unit_uuid')->constrained();
            $table->timestamp('movein_at')->nullable();
            $table->timestamp('moveout_at')->nullable();
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
        Schema::dropIfExists('guests');
    }
}
