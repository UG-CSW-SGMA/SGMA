<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosComprasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'DOCUMENTOS_COMPRAS';

    /**
     * Run the migrations.
     * @table DOCUMENTOS_COMPRAS
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('DOCUMENTO_COMPRA_NUMERO', 20)->primary()->comment('Numero_Documento');
            $table->integer('USER_ID')->nullable()->comment('UserId');
            $table->integer('SUJETO_ID')->nullable()->comment('DNI');
            $table->smallInteger('SUJETO_TIPO')->nullable()->comment('Tipo_Sujeto');
            $table->dateTime('DOCUMENTO_COMPRA_FECHA_DOCUMENTO')->nullable()->comment('Fecha_Documento');
            $table->smallInteger('TIPO_DOCUMENTO')->nullable()->default('1')->comment('Tipo_Documento (1=>Factura, 2=>Nota de Venta, 3=>Liquidacion Compras)');

            $table->unique(["DOCUMENTO_COMPRA_NUMERO"], 'DOCUMENTO_COMPRA_NUMERO_UNIQUE');

            $table->index(["USER_ID"], 'FK_DOCUMENTO_COMPRAS_ADMINISTRADOR_USUARIOS');

            $table->index(["SUJETO_ID", "SUJETO_TIPO"], 'FK_DOCUMENTO_COMPRAS_PROVEEDOR_SUJETOS');


            $table->foreign('USER_ID', 'FK_DOCUMENTO_COMPRAS_ADMINISTRADOR_USUARIOS')
                ->references('USER_ID')->on('USUARIOS')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('SUJETO_ID', 'FK_DOCUMENTO_COMPRAS_PROVEEDOR_SUJETOS')
                ->references('SUJETO_ID')->on('SUJETOS')
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
