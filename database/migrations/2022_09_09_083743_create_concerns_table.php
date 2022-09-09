<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcernsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concerns', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('tenant_uuid')->constrained()->nullable();
            $table->foreignUuid('unit_uuid')->constrained()->nullable();
            $table->foreignUuid('owner_uuid')->constrained()->nullabe();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('assessed_by_id')->constrained()->nullable();
            $table->foreignId('approved_by_id')->constrained()->nullable();
            $table->foreignId('assigned_to_id')->constrained()->nullable();
            $table->foreignUuid('property_uuid')->constrained()->nullable();
            $table->longText('concern');
            $table->longText('initial_assessment');
            $table->longText('action_taken');
            $table->string('concern_department');
            $table->string('urgency');    
            $table->integer('rating');
            $table->string('status');
            $table->longText('feedback')->nullable();        
            $table->string('payment_option')->nullable();
            $table->longText('scope_of_work');
            $table->date('assessed_at');
            $table->date('started_at');
            $table->date('ended_at');
            $table->boolean('is_warranty');
            $table->date('tenant_approved_at');
            $table->date('manager_approved_at');
            $table->date('owner_approved_at');
            $table->foreignUuid('payee_id');
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
        Schema::dropIfExists('concerns');
    }
}
