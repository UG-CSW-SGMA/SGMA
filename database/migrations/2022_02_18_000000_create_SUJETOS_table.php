<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSujetosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'SUJETOS';

    /**
     * Run the migrations.
     * @table SUJETOS
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('SUJETO_ID');
            $table->smallInteger('SUJETO_TIPO')->comment('Tipo_Sujeto(1=>Cliente, 2=>Proveedor)');
            $table->string('SUJETO_DNI', 20)->comment('DNI/CEDULA/RUC/PASSAPORTE/PLACA');
            $table->string('SUJETO_NOMBRES', 20)->comment('Nombres');
            $table->string('SUJETO_APELLIDOS', 20)->nullable()->default(null)->comment('Apellidos');
            $table->string('SUJETO_DIRECCION', 125)->nullable()->default(null)->comment('Direccion');
            $table->string('SUJETO_TELEFONO', 25)->nullable()->default(null)->comment('Telefono');
            $table->string('SUJETO_EMAIL', 25)->nullable()->default(null)->comment('Email');

            $table->unique(["SUJETO_ID"], 'SUJETO_ID_UNIQUE');
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
