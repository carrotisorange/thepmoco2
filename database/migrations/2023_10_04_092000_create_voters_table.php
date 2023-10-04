<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('owner_uuid')->constrained();
            $table->foreignId('election_id')->constrained();
            $table->boolean('is_voter');
            $table->boolean('is_candidate');
            $table->string('is_winner');
            $table->integer('number_of_years_as_hoa_member');
            $table->string('resume')->nullable();
            $table->foreignId('position_id');
            $table->integer('number_of_past_due_account');
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
        Schema::dropIfExists('voters');
    }
}
