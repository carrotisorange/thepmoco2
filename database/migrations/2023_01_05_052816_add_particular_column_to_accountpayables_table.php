<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParticularColumnToAccountpayablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_payables', function (Blueprint $table) {
            $table->foreignId('approver2_id')->constrained()->nullable();
            $table->longText('particular')->nullable();
            $table->string('quotation1')->nullable();
            $table->string('quotation2')->nullable();
            $table->string('quotation3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_payables', function (Blueprint $table) {
            $table->dropColumn('particular');
            $table->dropColumn('quotation1');
            $table->dropColumn('quotation2');
            $table->dropColumn('quotation3');
            $table->dropColumn('approver2_id');
        });
    }
}
