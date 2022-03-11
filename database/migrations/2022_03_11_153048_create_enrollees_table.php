<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolleesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollees', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->foreignUuid('unit_uuid')->constrained();
            $table->foreignUuid('owner_uuid')->constrained();
            $table->date('start');
            $table->date('end');
            $table->double('price',8,2);
            $table->string('status');
            $table->string('interaction');
            $table->string('unenrollment_reason');
            $table->double('discount', 8, 2);
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('enrollees');
    }
}
