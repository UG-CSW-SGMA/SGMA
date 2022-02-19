<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleOdaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'DETALLE_ODA';

    /**
     * Run the migrations.
     * @table DETALLE_ODA
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('DETALLE_ODA_LINEA')->comment('DetODALinea');
            $table->integer('PRODUCTO_ID')->nullable()->comment('ProductoId');
            $table->string('ODA_NUMERO', 15)->nullable()->default(null)->comment('NumODA');
            $table->decimal('DETALLE_ODA_CANTIDAD', 12, 4)->comment('Cantidad_ODA');
            $table->string('DETALLE_ODA_SERIE_PARTE', 20)->nullable()->default('')->comment('Serie_Parte');

            $table->unique(["DETALLE_ODA_LINEA"], 'DETALLE_ODA_LINEA_UNIQUE');

            $table->index(["ODA_NUMERO"], 'FK_DETALLE_ODA');

            $table->index(["PRODUCTO_ID"], 'FK_DETALLE_ODA_PRODUCTO');


            $table->foreign('ODA_NUMERO', 'FK_DETALLE_ODA')
                ->references('ODA_NUMERO')->on('ODA')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('PRODUCTO_ID', 'FK_DETALLE_ODA_PRODUCTO')
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
