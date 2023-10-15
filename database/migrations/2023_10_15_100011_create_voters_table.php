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
            $table->foreignId('house_owner_id')->constrained();
            $table->foreignId('election_id')->constrained();
            $table->boolean('is_voter')->nullable();
            $table->boolean('is_candidate')->nullable();
            $table->string('is_winner')->nullable();
            $table->integer('number_of_years_as_hoa_member');
            $table->string('resume')->nullable();
            $table->foreignId('position_id')->nullable();
            $table->integer('number_of_past_due_account')->nullable();
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
