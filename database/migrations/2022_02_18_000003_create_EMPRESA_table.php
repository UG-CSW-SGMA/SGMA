<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'EMPRESA';

    /**
     * Run the migrations.
     * @table EMPRESA
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('EMPRESA_ID');
            $table->string('EMPRESA_RUC', 13);
            $table->string('EMPRESA_RAZON_SOCIAL', 100)->nullable();
            $table->string('EMPRESA_NOMBRE_COMERCIAL', 45)->nullable();
            $table->string('EMPRESA_DIRECCION', 150);
            $table->string('EMPRESA_CEDULA_REPRESENTANTE_LEGAL', 13)->nullable();
            $table->string('EMPRESA_NOMBRE_REPRESENTANTE_LEGAL', 60)->nullable();
            $table->string('EMPRESA_CONTRIBUYENTE_ESPECIAL', 45)->nullable()->default('');
            $table->string('EMPRESA_CONTRIBUYENTE_REGIMEN', 45)->nullable()->default('');
            $table->string('EMPRESA_TIPO_CONTRIBUYENTE', 25)->nullable()->default('');
            $table->tinyInteger('EMPRESA_OBLIGADO_LLEVAR_CONTABILIDAD')->nullable()->default('0');
            $table->tinyInteger('EMPRESA_AGENTE_RETENCION')->nullable()->default('0');
            $table->dateTime('FECHA_CREACION')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('FECHA_ACTUALZIACION')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('ESTADO', 1)->default('A');
            $table->integer('USUARIO_ID_CREACION');
            $table->integer('USUARIO_ID_ACTUALIZACION')->nullable();

            $table->unique(["EMPRESA_ID"], 'EMPRESA_ID_UNIQUE');

            $table->index(["USUARIO_ID_CREACION"], 'fk_EMPRESA_USUARIOS1_idx');

            $table->index(["USUARIO_ID_ACTUALIZACION"], 'fk_EMPRESA_USUARIOS2_idx');


            $table->foreign('USUARIO_ID_CREACION', 'fk_EMPRESA_USUARIOS1_idx')
                ->references('USER_ID')->on('USUARIOS')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('USUARIO_ID_ACTUALIZACION', 'fk_EMPRESA_USUARIOS2_idx')
                ->references('USER_ID')->on('USUARIOS')
                ->onDelete('no action')
                ->onUpdate('no action');
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
