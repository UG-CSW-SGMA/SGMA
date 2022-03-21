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
        Schema::create('log_accesos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UsuarioId');
            $table->dateTime('FechaHoraAcceso');
            $table->string('Nombre_Navegador', 100);
            $table->string('IP', 17);
            $table->string('InfoAdicional', 255);

            $table->foreign('UsuarioId')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_accesos');
    }
};
