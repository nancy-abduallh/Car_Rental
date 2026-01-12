<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tblpages', function (Blueprint $table) {
            $table->string('PageName_ar')->nullable()->after('PageName');
            $table->text('detail_ar')->nullable()->after('detail');
        });
    }

    public function down()
    {
        Schema::table('tblpages', function (Blueprint $table) {
            $table->dropColumn(['PageName_ar', 'detail_ar']);
        });
    }
};