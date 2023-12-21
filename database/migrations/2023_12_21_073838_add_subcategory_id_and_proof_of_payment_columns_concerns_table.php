<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubcategoryIdAndProofOfPaymentColumnsConcernsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('concerns', function (Blueprint $table) {
            $table->foreignId('subcategory_id')->nullable()->constrained();
            $table->string('proof_of_payment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('concerns', function (Blueprint $table) {
            //
        });
    }
}
