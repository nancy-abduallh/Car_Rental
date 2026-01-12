<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tblbrands', function (Blueprint $table) {
            $table->string('BrandName_ar')->nullable()->after('BrandName');
        });
    }

    public function down()
    {
        Schema::table('tblbrands', function (Blueprint $table) {
            $table->dropColumn('BrandName_ar');
        });
    }
};