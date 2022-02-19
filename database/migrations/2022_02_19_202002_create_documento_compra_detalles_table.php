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
        Schema::create('documento_compra_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('DocumentoCompraId');
            $table->unsignedBigInteger('ProductoId');
            $table->string('Producto', 100)->comment('Concatenacion de la tabla Productos atributos Nombre+codigo');
            $table->string('NumeroSerieParte', 15)->nullable()->default('');
            $table->decimal('Cantidad', 12, 4)->default('1');
            $table->decimal('CostoUnitario', 18, 2)->default('0');
            $table->decimal('Impuestos', 18, 2)->default('0');
            $table->decimal('Total', 18, 2)->default('0');
            $table->boolean('Activo')->default(1);
            
            //Auditoria
            $table->unsignedBigInteger('UsuarioCreacion');
            $table->unsignedBigInteger('UsuarioActualizacion')->nullable();
            $table->timestamps();

            //Foreign key
            $table->foreign('DocumentoCompraId')->references('Id')->on('documento_compras');
            $table->foreign('ProductoId')->references('Id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento_compra_detalles');
    }
};
