<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuestUuidColumnInAcknowledgementReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acknowledgement_receipts', function (Blueprint $table) {
            $table->foreignUuid('guest_uuid')->constrained()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('acknowledgement_receipts', function (Blueprint $table) {
            //
        });
    }
}
