<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'USUARIOS';

    /**
     * Run the migrations.
     * @table USUARIOS
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('USER_ID')->comment('UserId');
            $table->smallInteger('USER_ROL')->comment('Rol_Usuario (1=>Administrador, 2=>Gerente, 3=>Mecanico, 4=>Vendedor)');
            $table->string('USER_NOMBRE', 30)->comment('Nombre_Usuario');
            $table->binary('USER_PASSWORDSALT')->comment('PasswordSalt');
            $table->binary('USER_PASSWORDHASH')->comment('PasswordHash');
            $table->string('USER_NICKNAME', 15)->comment('NickName');
            $table->string('USER_EMAIL', 25)->nullable()->default(null)->comment('Email_Usuario');

            $table->unique(["USER_ID"], 'USER_ID_UNIQUE');
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
