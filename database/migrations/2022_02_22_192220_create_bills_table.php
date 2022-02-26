<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->double('bill', 8, 2);
            $table->integer('bill_no');
            $table->date('start');
            $table->date('end');
            $table->date('due_date');
            $table->double('penalty', 8, 2);
            $table->string('status');
            $table->foreignUuid('tenant_uuid')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('particular_id')->constraind();
            $table->foreignUuid('property_uuid')->constrained();
            $table->foreignUuid('room_uuid')->constrained();
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
        Schema::dropIfExists('bills');
    }
}
