<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOwnerUuidToAcknowledgementReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acknowledgement_receipts', function (Blueprint $table) {
            $table->foreignUuid('owner_uuid')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('acknowledgment_receipts', function (Blueprint $table) {
            //
        });
    }
}
