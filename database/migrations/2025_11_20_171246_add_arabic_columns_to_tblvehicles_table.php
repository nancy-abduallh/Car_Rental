<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tblvehicles', function (Blueprint $table) {
            $table->string('VehiclesTitle_ar')->nullable()->after('VehiclesTitle');
            $table->text('VehiclesOverview_ar')->nullable()->after('VehiclesOverview');
            $table->string('FuelType_ar')->nullable()->after('FuelType');
        });
    }

    public function down()
    {
        Schema::table('tblvehicles', function (Blueprint $table) {
            $table->dropColumn(['VehiclesTitle_ar', 'VehiclesOverview_ar', 'FuelType_ar']);
        });
    }
};