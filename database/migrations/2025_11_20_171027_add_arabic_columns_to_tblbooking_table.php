<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tblbooking', function (Blueprint $table) {
            $table->text('message_ar')->nullable()->after('message');
            $table->string('Status_ar')->nullable()->after('Status');
        });
    }

    public function down()
    {
        Schema::table('tblbooking', function (Blueprint $table) {
            $table->dropColumn(['message_ar', 'Status_ar']);
        });
    }
};