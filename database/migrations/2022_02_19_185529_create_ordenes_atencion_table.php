<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_atencion', function (Blueprint $table) {
            $table->id();
            $table->string('NumeroTransaccion', 15)->comment('Numero de ODA');
            $table->unsignedBigInteger('TipoServicioId');
            $table->unsignedBigInteger('MecanicoId')->nullable();
            $table->unsignedBigInteger('VendedorId')->nullable();
            $table->unsignedBigInteger('SujetoId');
            $table->string('DNI', 20)->comment('DNI/CEDULA/RUC/PASSAPORTE');
            $table->string('Cliente', 20)->comment('Concatenacion de la tabla Sujetos atributos Nombres+Apellidos');
            $table->dateTime('FechaHora')->comment('Fecha y Hora de creacion de la ODA');
            $table->unsignedBigInteger('VehiculoId');
            $table->string('Placa', 10);
            $table->string('Vehiculo', 25)->comment('Concatenacion de la tabla Vehiculo atributos Marka+Modelo');
            $table->string('DescripcionRecepcionVehiculo', 125)->nullable()->default('');
            $table->dateTime('FechaHoraInicioAtencion')->nullable()->default(null);
            $table->dateTime('FechaHoraCierreAtencion')->nullable()->default(null);
            $table->enum('EstadoODA', [1, 2, 3, 4])->comment('Estado(1=>Activo, 2=>En Atecion, 3=>Cerrado, 4=>No Atendido)');

            //Auditoria
            $table->unsignedBigInteger('UsuarioCreacion');
            $table->unsignedBigInteger('UsuarioActualizacion')->nullable();
            $table->timestamps();

            //Foreign key
            $table->foreign('SujetoId')->references('Id')->on('sujetos');
            $table->foreign('TipoServicioId')->references('Id')->on('tipo_servicios');
            $table->foreign('MecanicoId')->references('Id')->on('usuarios');
            $table->foreign('VendedorId')->references('Id')->on('usuarios');
            $table->foreign('VehiculoID')->references('Id')->on('vehiculos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes_atencion');
    }
};
