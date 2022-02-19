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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CategoriaId');
            $table->string('Codigo', 20);
            $table->string('Nombre', 40);
            $table->string('Descripcion', 150)->nullable()->default('');
            $table->string('NumeroParte', 15)->nullable()->default('');
            $table->decimal('Precio', 18, 6)->default('0');
            $table->decimal('Costo', 18, 6)->default('0');

            //Auditoria
            $table->unsignedBigInteger('UsuarioCreacion');
            $table->unsignedBigInteger('UsuarioActualizacion')->nullable();
            $table->timestamps();

            //Foreign key
            $table->foreign('CategoriaId')->references('Id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
