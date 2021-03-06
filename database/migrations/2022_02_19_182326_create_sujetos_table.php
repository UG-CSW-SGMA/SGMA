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
            $table->enum('TipoSujeto', [1, 2])->comment('Tipo_Sujeto(1=>Cliente, 2=>Proveedor)');
            $table->string('DNI', 20)->comment('DNI/CEDULA/RUC/PASSAPORTE');
            $table->string('Nombre', 50)->comment('Nombres');
            $table->string('Apellido', 30)->nullable()->default(null)->comment('Apellidos');
            $table->string('Direccion', 255)->nullable()->default(null)->comment('Direccion');
            $table->string('Telefono', 25)->nullable()->default(null)->comment('Telefono');
            $table->string('Email', 50)->nullable()->default(null)->comment('Email');
            $table->boolean('Activo')->default(1);

            //Auditoria
            $table->unsignedBigInteger('UserCreated');
            $table->unsignedBigInteger('UserUpdated')->nullable();
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
