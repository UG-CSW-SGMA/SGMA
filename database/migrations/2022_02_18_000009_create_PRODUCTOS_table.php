<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'PRODUCTOS';

    /**
     * Run the migrations.
     * @table PRODUCTOS
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('PRODUCTO_ID')->comment('ProductoId');
            $table->smallInteger('CATEGORIA_ID')->nullable()->default(null)->comment('CategoriaId');
            $table->string('PRODUCTO_NOMBRE', 25)->comment('Nombre_Producto');
            $table->string('PRODUCTO_NUMERO_PARTE', 15)->comment('Numero_Parte');
            $table->decimal('PRODUCTO_PRECIO', 18, 6)->default('0')->comment('Precio');
            $table->decimal('PRODUCTO_COSTO', 18, 6)->default('0')->comment('Costo');

            $table->unique(["PRODUCTO_ID"], 'PRODUCTO_ID_UNIQUE');

            $table->index(["CATEGORIA_ID"], 'FK_PRODUCTO_CATEGORIA');


            $table->foreign('CATEGORIA_ID', 'FK_PRODUCTO_CATEGORIA')
                ->references('CATEGORIA_ID')->on('CATEGORIA')
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
