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
        Schema::create('sujetos', function (Blueprint $table) {
            $table->id();
            $table->enum('TipoSujeto', ['1', '2'])->comment('Tipo_Sujeto(1=>Cliente, 2=>Proveedor)');
            $table->string('DNI', 20)->comment('DNI/CEDULA/RUC/PASSAPORTE');
            $table->string('Nombre', 20)->comment('Nombres');
            $table->string('Apellido', 20)->nullable()->default(null)->comment('Apellidos');
            $table->string('Direccion', 125)->nullable()->default(null)->comment('Direccion');
            $table->string('Telefono', 25)->nullable()->default(null)->comment('Telefono');
            $table->string('Email', 25)->nullable()->default(null)->comment('Email');

            //Auditoria
            $table->unsignedBigInteger('UsuarioCreacion');
            $table->unsignedBigInteger('UsuarioActualizacion')->nullable();
            $table->timestamps();

            //Primary key
            $table->unique(['TipoSujeto', 'DNI']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sujetos');
    }
};
