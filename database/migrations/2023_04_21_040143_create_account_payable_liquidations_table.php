<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountPayableLiquidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_payable_liquidations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department');
            $table->foreignUuid('unit_uuid')->nullable()->constrained();
            $table->string('batch_no');
            $table->double('total');
            $table->double('cash_advance');
            $table->string('cv_number')->nullable();
            $table->string('total_type')->nullable();
            $table->double('total_amount')->nullable();
            $table->foreignId('prepared_by')->constrained();
            $table->foreignId('noted_by')->nullable()->constrained();
            $table->foreignId('approved_by')->nullable()->constrained();
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
        Schema::dropIfExists('account_payable_liquidations');
    }
}
