<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleDocumentoComprasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'DETALLE_DOCUMENTO_COMPRAS';

    /**
     * Run the migrations.
     * @table DETALLE_DOCUMENTO_COMPRAS
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('DETALLE_DOCUMENTO_COMPRA_LINEA')->comment('DetDocLinea');
            $table->string('DOCUMENTO_COMPRA_NUMERO', 20)->nullable()->default('')->comment('Numero_Documento');
            $table->integer('PRODUCTO_ID')->nullable()->default('0')->comment('ProductoId');
            $table->decimal('DETALLE_DOCUMENTO_COMPRA_CANTIDAD', 18, 4)->nullable()->default('0')->comment('Cantidad_Compra');
            $table->decimal('COSTO_UNITARIO_COMPRA', 18, 6)->nullable()->default('0')->comment('Costo_Unitario_Compra');
            $table->decimal('DETALLE_DOCUMENTO_COMPRA_COSTOTOTAL', 18, 6)->nullable()->default('0')->comment('Costo_Total_Compra');

            $table->unique(["DETALLE_DOCUMENTO_COMPRA_LINEA"], 'DETALLE_DOCUMENTO_COMPRA_LINEA_UNIQUE');

            $table->index(["DOCUMENTO_COMPRA_NUMERO"], 'FK_DETALLE_DOCUMENTO_COMPRAS');

            $table->index(["PRODUCTO_ID"], 'FK_DETALLE_COMPRA_PRODUCTO');


            $table->foreign('PRODUCTO_ID', 'FK_DETALLE_COMPRA_PRODUCTO')
                ->references('PRODUCTO_ID')->on('PRODUCTOS')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('DOCUMENTO_COMPRA_NUMERO', 'FK_DETALLE_DOCUMENTO_COMPRAS')
                ->references('DOCUMENTO_COMPRA_NUMERO')->on('DOCUMENTOS_COMPRAS')
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
