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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->enum('TipoRol', ['1', '2', '3', '4'])->comment('Rol_Usuario (1=>Administrador, 2=>Gerente, 3=>Mecanico, 4=>Vendedor)');
            $table->string('NickName', 15);
            $table->string('Email', 25)->nullable()->default(null)->comment('Email_Usuario');
            $table->string('NombreCompleto', 30);
            $table->binary('PasswordSALT');
            $table->binary('PasswordHASH');

            //Auditoria
            $table->unsignedBigInteger('UsuarioCreacion');
            $table->unsignedBigInteger('UsuarioActualizacion');
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
        Schema::dropIfExists('usuarios');
    }
};
