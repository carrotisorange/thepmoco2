<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
            $table->foreignUuid('unit_uuid')->constrained();
            $table->foreignUuid('tenant_uuid')->constrained();
            $table->foreignUuid('property_uuid')->constrained();
            $table->date('start');
            $table->date('end');
            $table->timestamp('moveout_at')->nullable();
            $table->string('bill_reference_no')->nullable();
            $table->double('rent',8,2);
            $table->string('status');
            $table->string('moveout_reason');
            $table->double('discount', 8, 2);
            $table->foreignId('user_id')->constrained();
            $table->string('contract')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
