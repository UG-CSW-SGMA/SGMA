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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('RUC', 13);
            $table->string('RazonSocial', 100);
            $table->string('NombreComercial', 45);
            $table->string('Direccion', 150);
            $table->string('DNIRepresentanteLegal', 13)->nullable();
            $table->string('NombreRepresentanteLegal', 60)->nullable();
            $table->string('ContribuyenteEspecial', 45)->nullable()->default('');
            $table->string('ContribuyenteRegimen', 45)->nullable()->default('');
            $table->string('TipoContribuyente', 25)->nullable()->default('');
            $table->tinyInteger('ObligadoLlevarContabilidad')->nullable()->default('0');
            $table->tinyInteger('AgenteRetencion')->nullable()->default('0');
            $table->string('Estado', 1)->default('A');

            //Auditoria
            $table->unsignedBigInteger('UsuarioCreacion');
            $table->unsignedBigInteger('UsuarioActualizacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
