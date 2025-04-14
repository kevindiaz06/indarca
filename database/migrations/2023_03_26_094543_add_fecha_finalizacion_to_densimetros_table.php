<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('densimetros', function (Blueprint $table) {
            $table->date('fecha_finalizacion')->nullable()->after('fecha_entrada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('densimetros', function (Blueprint $table) {
            $table->dropColumn('fecha_finalizacion');
        });
    }
};
