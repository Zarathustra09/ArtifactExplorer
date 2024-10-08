<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->string('device_identifier')->nullable();
        });
    }

    public function down()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->dropColumn('device_identifier');
        });
    }
};
