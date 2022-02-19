<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKardexTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'KARDEX';

    /**
     * Run the migrations.
     * @table KARDEX
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('KARDEX_ORDEN_REGISTRO')->comment('Kardex_Orden_Registro');
            $table->string('KARDEX_TIPO_MOVIMIENTO', 3)->comment('Kardex_Tipo_Movimiento (IN=>Ingreso, OUT=>Salida)');
            $table->dateTime('KARDEX_FECHA_MOVIMIENTO')->comment('Kardex_Fecha_Movimiento');
            $table->string('KARDEX_NUMERO_DOCUMENTO', 20)->comment('Kardex_Numero_Documento');
            $table->integer('PRODUCTO_ID')->nullable()->default(null)->comment('ProductoId');
            $table->decimal('KARDEX_CANTIDAD', 18, 4)->comment('Cantidad_Movimiento');
            $table->decimal('KARDEX_COSTO_TOTAL', 18, 6)->comment('Costo_Total_Movimiento');
            $table->decimal('KARDEX_CANTIDAD_TOTAL_SALDO', 18, 4)->comment('Cantidad_Total_Saldo');
            $table->decimal('KARDEX_COSTO_TOTAL_SALDO', 18, 6)->comment('Costo_Total_Saldo');

            $table->unique(["KARDEX_ORDEN_REGISTRO"], 'KARDEX_ORDEN_REGISTRO_UNIQUE');

            $table->index(["PRODUCTO_ID"], 'FK_KARDEX_PRODUCTO');


            $table->foreign('PRODUCTO_ID', 'FK_KARDEX_PRODUCTO')
                ->references('PRODUCTO_ID')->on('PRODUCTOS')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
