<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained();
            $table->foreignUuid('property_uuid')->constrained();
            $table->boolean('hasAccessToTenant')->nullable();
            $table->boolean('hasAccessToProperty')->nullable();
            $table->boolean('hasAccessToDashboard')->nullable();
            $table->boolean('hasAccessToEmployee')->nullable();
            $table->boolean('hasAccessToRoom')->nullable();
            $table->boolean('hasAccessToContract')->nullable();
            $table->boolean('hasAccessToOwner')->nullable();
            $table->boolean('hasAccessToBill')->nullable();
            $table->boolean('hasAccessToCollection')->nullable();
            $table->boolean('hasAccessToRole')->nullable();
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
        Schema::dropIfExists('property_roles');
    }
}
