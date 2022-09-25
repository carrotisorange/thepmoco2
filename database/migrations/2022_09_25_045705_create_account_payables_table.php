<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountPayablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_payables', function (Blueprint $table) {
            $table->id();
            $table->string('request_for');
            $table->foreignId('particular_id')->constrained();
            $table->foreignId('requester_id')->constrained();
            $table->foreignId('biller_id')->constrained();
            $table->double('amount');
            $table->string('source');
            $table->boolean('is_approved');
            $table->timestamp('approved_at');
            $table->foreignId('approver_id')->constrained();
            $table->longText('remarks');
            $table->string('attachment');
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
        Schema::dropIfExists('account_payables');
    }
}
