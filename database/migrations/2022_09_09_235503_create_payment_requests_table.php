<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('tenant_uuid')->constrained()->nullable();
            $table->foreignUuid('owner_uuid')->constrained()->nullable();
            $table->longText('bill_nos');
            $table->double('amount');
            $table->string('proof_of_payment')->nullable();
            $table->string('batch_no');
            $table->string('status');
            $table->longText('reason_for_rejection')->nullable();
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
        Schema::dropIfExists('payment_requests');
    }
}
