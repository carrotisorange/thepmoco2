<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitInventories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_inventories', function (Blueprint $table) {
            $table->string('item');
            $table->integer('quantity');
            $table->foreignUuid('unit_uuid')->constrained();
            $table->longText('remarks')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_inventories');
    }
}
