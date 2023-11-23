<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violations', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
            $table->foreignUuid('property_uuid')->constrained();
            $table->foreignUuid('tenant_uuid')->nullable()->constrained();
            $table->foreignUuid('owner_uuid')->nullable()->constrained();
            $table->foreignUuid('unit_uuid')->nullable()->constrained();
            $table->foreignId('type_id')->nullable()->constrained();
            $table->string('violation');
            $table->longText('details')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_billed')->default(0);
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('violations');
    }
}
