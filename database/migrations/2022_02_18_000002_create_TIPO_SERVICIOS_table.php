<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoServiciosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'TIPO_SERVICIOS';

    /**
     * Run the migrations.
     * @table TIPO_SERVICIOS
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('SERVICIO_ID')->comment('ServicioId');
            $table->string('SERVICIO_NOMBRE', 25)->comment('Nombre_Tipo_Servicio');

            $table->unique(["SERVICIO_ID"], 'SERVICIO_ID_UNIQUE');
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
