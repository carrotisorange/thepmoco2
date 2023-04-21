<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountPayableLiquidationParticulars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_payable_liquidation_particulars', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->double('price');
            $table->integer('quantity');
            $table->string('batch_no');
            $table->double('total');
            $table->foreignUuid('unit_uuid')->nullable()->constrained();
            $table->foreignId('vendor_id')->nullable()->constrained();
            $table->string('or_number');
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
        Schema::dropIfExists('account_payable_liquidation_particulars');
    }
}
