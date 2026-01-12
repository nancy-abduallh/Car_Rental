<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tblcontactusquery', function (Blueprint $table) {
            $table->string('name_ar')->nullable()->after('name');
            $table->text('Message_ar')->nullable()->after('Message');
        });
    }

    public function down()
    {
        Schema::table('tblcontactusquery', function (Blueprint $table) {
            $table->dropColumn(['name_ar', 'Message_ar']);
        });
    }
};