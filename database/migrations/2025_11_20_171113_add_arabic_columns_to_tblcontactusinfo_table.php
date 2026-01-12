<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tblcontactusinfo', function (Blueprint $table) {
            $table->text('Address_ar')->nullable()->after('Address');
        });
    }

    public function down()
    {
        Schema::table('tblcontactusinfo', function (Blueprint $table) {
            $table->dropColumn('Address_ar');
        });
    }
};