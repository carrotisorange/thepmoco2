<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table){
            $table->id();
            $table->double('collection', 8, 2);
            $table->foreignUuid('tenant_uuid')->constrained();
            $table->foreignUuid('unit_uuid')->constrained();
            $table->foreignUuid('property_uuid')->constrained();
            $table->foreignUuid('owner_uuid')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('ar_no');
            $table->string('bill_reference_no');
            $table->string('form');
            $table->foreignId('bill_id')->constrained();
            $table->longText('note')->nullable();
            $table->longText('reason_for_deletion')->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('collections');
    }
}
