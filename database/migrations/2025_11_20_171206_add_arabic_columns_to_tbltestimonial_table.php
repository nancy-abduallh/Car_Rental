<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tbltestimonial', function (Blueprint $table) {
            $table->text('Testimonial_ar')->nullable()->after('Testimonial');
        });
    }

    public function down()
    {
        Schema::table('tbltestimonial', function (Blueprint $table) {
            $table->dropColumn('Testimonial_ar');
        });
    }
};