<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elections', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('property_uuid')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->date('date_of_election')->nullable();
            $table->double('time_limit')->nullable();
            $table->boolean('is_proxy_voting_allowed')->nullable();
            $table->longText('other_policies')->nullable();
            $table->integer('number_of_candidates')->nullable();
            $table->integer('number_of_winning_candidates')->nullable();
            $table->longText('greetings')->nullable();
            $table->longText('elecom_rules')->nullable();
            $table->longText('general_instructions')->nullable();
            $table->string('mode_of_conducting_election')->default('online');
            $table->integer('number_of_months_behind_dues')->default(2);
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('elections');
    }
}
