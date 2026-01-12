<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tblusers', function (Blueprint $table) {
            $table->string('FullName_ar')->nullable()->after('FullName');
            $table->text('Address_ar')->nullable()->after('Address');
            $table->string('City_ar')->nullable()->after('City');
            $table->string('Country_ar')->nullable()->after('Country');
        });
    }

    public function down()
    {
        Schema::table('tblusers', function (Blueprint $table) {
            $table->dropColumn(['FullName_ar', 'Address_ar', 'City_ar', 'Country_ar']);
        });
    }
};