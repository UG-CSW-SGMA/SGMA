<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogAccesosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'LOG_ACCESOS';

    /**
     * Run the migrations.
     * @table LOG_ACCESOS
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('ACCESO_ID')->default('UUID()')->comment('AccesoId');
            $table->integer('USER_ID')->comment('UserId');
            $table->dateTime('ACCESO_FECHA_HORA_ACCESO')->comment('Fecha_Hora');
            $table->string('ACCESO_NOMBRE_NAVEGADOR', 25)->comment('Nombre_Navegador');
            $table->string('ACCESO_IP', 17)->comment('IP');

            $table->unique(["ACCESO_ID"], 'ACCESO_ID_UNIQUE');

            $table->unique(["USER_ID"], 'USER_ID_UNIQUE');

            $table->index(["USER_ID"], 'FK_LOG_ACCESO_USUARIO');


            $table->foreign('USER_ID', 'FK_LOG_ACCESO_USUARIO')
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
