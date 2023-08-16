<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemittancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remittances', function (Blueprint $table) {
$table->id();
            $table->foreignUuid('unit_uuid')->constrained();
            $table->foreignUuid('property_uuid')->constrained();
            $table->string('ar_no');
            $table->string('particular_id')->constrained();
            $table->foreignUuid('owner_uuid')->nullable()->constrained();
            $table->foreignUuid('tenant_uuid')->nullable()->constrained();
            $table->foreignUuid('guest_uuid')->nullable()->constrained();
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->double('monthly_rent')->nullable();
            $table->double('net_rent')->nullable();
            $table->double('management_fee')->nullable();
            $table->double('marketing_fee')->nullable();

            $table->double('bank_transfer_fee')->nullable();
            
            $table->double('miscellaneous_fee')->nullable();
            $table->double('miscellaneous_fee_description')->nullable();
            
            $table->double('membership_fee')->nullable();
            $table->double('membership_fee_description')->nullable();
            
            $table->double('condo_dues')->nullable();
            $table->double('condo_dues_description')->nullable();
            
            $table->double('parking_dues')->nullable();
            $table->double('parking_dues_description')->nullable();
            
            $table->double('water')->nullable();
            $table->double('water_description')->nullable();

            $table->double('electricity')->nullable();
            $table->double('electricity_description')->nullable();
            
            $table->double('generator_share')->nullable();
            $table->double('generator_share_description')->nullable();
            
            $table->double('surcharges')->nullable();
            $table->double('surcharges_description')->nullable();
            
            $table->double('building_insurance')->nullable();
            $table->double('building_insurance_description')->nullable();
            
            $table->double('real_property_tax')->nullable();
            $table->double('real_property_tax_description')->nullable();

            $table->double('housekeeping_fee')->nullable();
            $table->double('housekeeping_fee_description')->nullable();
            
            $table->double('laundry_fee')->nullable();
            $table->double('laundry_fee_description')->nullable();
            
            $table->double('complimentary')->nullable();
            $table->double('complimentary_description')->nullable();
            
            $table->double('internet')->nullable();
            $table->double('internet_description')->nullable();

            $table->double('special_assessment')->nullable();
            $table->double('special_assessment_description')->nullable();
            
            $table->double('materials_recovery_facility')->nullable();
            $table->double('materials_recovery_facility_description')->nullable();
            
            $table->double('recharge_of_fire_extinguisher')->nullable();
            $table->double('recharge_of_fire_extinguisher_description')->nullable();
            
            $table->double('environmental_fee')->nullable();
            $table->double('environmental_fee_description')->nullable();
            
            $table->double('bladder_tank')->nullable();
            $table->double('bladder_tank_description')->nullable();
            
            $table->double('cause_of_magnet')->nullable();
            $table->double('cause_of_magnet_description')->nullable();
            
            $table->double('total_deductions')->nullable();
            $table->double('total_deductions_description')->nullable();
            
            $table->double('remittance')->nullable();
            
            $table->string('cv_no')->nullable();
            
            $table->string('check_no')->nullable();
            
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
        Schema::dropIfExists('remittances');
    }
}
