<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'VEHICULO';

    /**
     * Run the migrations.
     * @table VEHICULO
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('VEHICULO_ID')->comment('VehiculoId');
            $table->integer('SUJETO_ID')->comment('DNI');
            $table->smallInteger('SUJETO_TIPO')->comment('Tipo_Sujeto');
            $table->string('VEHICULO_PLACA', 10)->comment('Placa');
            $table->string('VEHICULO_MODELO', 25)->comment('Modelo');
            $table->string('VEHICULO_DESCRIPCION', 125)->nullable()->default(null)->comment('Descripcion');

            $table->unique(["VEHICULO_ID"], 'VEHICULO_ID_UNIQUE');

            $table->index(["SUJETO_ID", "SUJETO_TIPO"], 'FK_VEHICULO_SUJETO');


            $table->foreign('SUJETO_ID', 'FK_VEHICULO_SUJETO')
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
