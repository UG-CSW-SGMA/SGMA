<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'CATEGORIA';

    /**
     * Run the migrations.
     * @table CATEGORIA
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('CATEGORIA_ID')->comment('CategoriaId');
            $table->smallInteger('SERVICIO_ID')->comment('ServicioId');
            $table->string('CATEGORIA_NOMBRE', 25)->comment('Nombre_Categoria');

            $table->unique(["CATEGORIA_ID"], 'CATEGORIA_ID_UNIQUE');

            $table->index(["SERVICIO_ID"], 'FK_CATEGORIA_TIPO_SERVICIOS');


            $table->foreign('SERVICIO_ID', 'FK_CATEGORIA_TIPO_SERVICIOS')
                ->references('SERVICIO_ID')->on('TIPO_SERVICIOS')
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
