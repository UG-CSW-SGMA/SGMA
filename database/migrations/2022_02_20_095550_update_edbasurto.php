<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * //Actualizacion por requisito de @edbasuto en sus campos 
     *
     * @return void
     */
    public function up()
    {

        Schema::table('vehiculos', function (Blueprint $table) {

            $table->string('Anio', 4);
            $table->string('Tipo', 20);
            $table->string('Color', 25)->default('No definido');
        });

        Schema::table('ordenes_atencion', function (Blueprint $table) {

            $table->string('KilometroActualVehiculo', 15)->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehiculos', function (Blueprint $table) {

            $table->dropColumn('Anio');
            $table->stdropColumnring('Tipo');
            $table->dropColumn('Color');
        });

        Schema::table('ordenes_atencion', function (Blueprint $table) {

            $table->dropColumn('KilometroActualVehiculo', 15);
        });
    }
};
