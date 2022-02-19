<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ODA';

    /**
     * Run the migrations.
     * @table ODA
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('ODA_NUMERO', 15)->primary()->comment('NumODA');
            $table->integer('SUJETO_ID')->comment('DNI');
            $table->smallInteger('SUJETO_TIPO')->comment('Tipo_Sujeto(1=>Activo, 2=>En Atención, 3=>Cerrado)');
            $table->smallInteger('VEHICULO_ID')->comment('VehiculoId');
            $table->integer('VENDEDOR_USER_ID')->comment('Vendedor_userId');
            $table->smallInteger('SERVICIO_ID')->comment('ServicioId');
            $table->integer('MECANICO_USER_ID')->comment('Mecanico_userId');
            $table->dateTime('ODA_FECHA_HORA_INGRESO')->comment('Fecha_Hora_Ingreso');
            $table->dateTime('ODA_FECHA_HORA_CIERRE')->nullable()->default(null)->comment('Fecha_Hora_Cierre');
            $table->string('ODA_DESCRIPCION_RECEPCION_VEHICULO', 125)->nullable()->default(null)->comment('Descripcion_Recepcion_Vehiculo');
            $table->string('ODA_INFORME')->nullable()->default(null)->comment('Informe');
            $table->smallInteger('ESTADO_DOCUMENTO')->nullable()->default('1')->comment('Estado_Documento');

            $table->unique(["ODA_NUMERO"], 'ODA_NUMERO_UNIQUE');

            $table->index(["MECANICO_USER_ID"], 'FK_ODA_MECANICO_USUARIOS');

            $table->index(["SERVICIO_ID"], 'FK_ODA_TIPO_SERVICIO');

            $table->index(["VEHICULO_ID"], 'FK_ODA_VEHICULO');

            $table->index(["VENDEDOR_USER_ID"], 'FK_ODA_VENDEDOR_USUARIOS');

            $table->index(["SUJETO_ID", "SUJETO_TIPO"], 'FK_ODA_CLIENTE');


            $table->foreign('SUJETO_ID', 'FK_ODA_CLIENTE')
                ->references('SUJETO_ID')->on('SUJETOS')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('MECANICO_USER_ID', 'FK_ODA_MECANICO_USUARIOS')
                ->references('USER_ID')->on('USUARIOS')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('SERVICIO_ID', 'FK_ODA_TIPO_SERVICIO')
                ->references('SERVICIO_ID')->on('TIPO_SERVICIOS')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('VEHICULO_ID', 'FK_ODA_VEHICULO')
                ->references('VEHICULO_ID')->on('VEHICULO')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('VENDEDOR_USER_ID', 'FK_ODA_VENDEDOR_USUARIOS')
                ->references('USER_ID')->on('USUARIOS')
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
