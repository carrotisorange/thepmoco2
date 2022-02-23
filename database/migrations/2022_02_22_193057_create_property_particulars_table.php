<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyParticularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_particulars', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('property_uuid')->constrained();
            $table->foreignid('particular_id')->constrained();
            $table->double('minimum_charge', 8, 2);
            $table->date('due_date');
            $table->double('surcharge', 8, 2);
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
        Schema::dropIfExists('property_particulars');
    }
}
