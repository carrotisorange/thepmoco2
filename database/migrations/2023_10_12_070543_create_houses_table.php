<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('house');
            $table->longText('address')->nullable();
            $table->foreignUuid('property_uuid')->constrained();
            $table->foreignId('status_id')->constrained();
            $table->foreignId('category_ud')->constrained();
            $table->string('batch_no');
            $table->string('doc1')->nullable();
            $table->string('doc2')->nullable();
            $table->string('doc3')->nullable();
            $table->string('doc4')->nullable();
            $table->string('doc5')->nullable();
            $table->string('doc6')->nullable();
            $table->string('doc7')->nullable();
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
        Schema::dropIfExists('houses');
    }
}
