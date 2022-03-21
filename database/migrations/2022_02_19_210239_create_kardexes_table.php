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
        Schema::create('kardexes', function (Blueprint $table) {
            $table->id();
            $table->enum('TipoMovimiento', ['IN', 'OUT'])->comment('Kardex_Tipo_Movimiento (IN=>Ingreso, OUT=>Salida)');
            $table->dateTime('FechaMovimiento');
            $table->unsignedBigInteger('TransaccionID');
            $table->string('Transaccion', 20);
            $table->unsignedBigInteger('ProductoId');
            $table->string('Producto', 100)->comment('Concatenacion de la tabla Productos atributos Nombre+codigo');
            $table->decimal('Cantidad', 18, 4);
            $table->decimal('CostoTotal', 18, 6);
            $table->decimal('CantidadSaldo', 18, 4);
            $table->decimal('CostoToalSaldo', 18, 6);

            //Auditoria
            $table->unsignedBigInteger('UserCreated');
            $table->unsignedBigInteger('UserUpdated')->nullable();
            $table->timestamps();

            //Foreign key 
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
        Schema::dropIfExists('kardexes');
    }
};
