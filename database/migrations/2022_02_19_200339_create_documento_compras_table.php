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
        Schema::create('documento_compras', function (Blueprint $table) {
            $table->id();
            $table->string('NumeroCompra', 20);
            $table->date('FechaDocumento');
            $table->string('NumeroDocumento', 20);
            $table->enum('TipoDocumento', [1, 2, 3])->default('1')->comment('Tipo_Documento (1=>Factura, 2=>Nota de Venta, 3=>Liquidacion Compras)');
            $table->unsignedBigInteger('SujetoId');
            $table->string('DNI', 20)->comment('DNI/CEDULA/RUC/PASSAPORTE');
            $table->string('Proveedor', 20)->comment('Concatenacion de la tabla Sujetos atributos Nombres+Apellidos');
            $table->decimal('ValorSinImpuestos', 18, 2)->default('0');
            $table->decimal('ValorImpuestos', 18, 2)->default('0');
            $table->decimal('ValorTotal', 18, 2)->default('0');
            $table->enum('EstadoCompra', [1, 2, 3])->comment('Estado(1=>Activo, 2=>Cerrado, 3=>Anulado)');

            //Auditoria
            $table->unsignedBigInteger('UserCreated');
            $table->unsignedBigInteger('UserUpdated')->nullable();
            $table->timestamps();

            //Foreign key
            $table->foreign('SujetoId')->references('Id')->on('sujetos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento_compras');
    }
};
