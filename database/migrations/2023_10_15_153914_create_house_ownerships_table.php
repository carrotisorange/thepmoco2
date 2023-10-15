<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseOwnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_ownerships', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('house_owner_id')->constrained();
            $table->foreignId('house_id')->constrained();
            $table->foreignUuid('property_uuid')->constrained();
            $table->double('price')->nullable();
            $table->date('turnover_at')->nullable();
            $table->string('status')->nullable();
            $table->string('contract')->nullable();
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
        Schema::dropIfExists('house_ownerships');
    }
}
