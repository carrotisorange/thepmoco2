<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcknowledgementReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acknowledgement_receipts', function (Blueprint $table) {
           $table->id();
           $table->double('amount', 8, 2);
           $table->foreignUuid('tenant_uuid')->constrained();
           $table->foreignUuid('property_uuid')->constrained();
           $table->foreignId('user_id')->constrained();
           $table->integer('ar_no');
           $table->string('mode_of_payment');
           $table->longText('note')->nullable();
           $table->longText('reason_for_deletion')->nullable();
           $table->string('attachment')->nullable();
           $table->string('collection_batch_no');
           $table->string('cheque_no')->nullable();
           $table->string('bank')->nullable();
           $table->date('date_deposited')->nullable();
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
        Schema::dropIfExists('acknowledgement_receipts');
    }
}
