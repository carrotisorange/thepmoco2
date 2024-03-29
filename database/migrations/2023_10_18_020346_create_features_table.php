<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
          $table->id();
          $table->string('feature');
          $table->longText('description')->nullable();
        $table->double('price');
        $table->string('icon')->nullable();
        $table->boolean('is_active')->nullable();
        $table->longText('subfeatures')->nullable();
        $table->string('alias')->nullable();
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
        Schema::dropIfExists('features');
    }
}
