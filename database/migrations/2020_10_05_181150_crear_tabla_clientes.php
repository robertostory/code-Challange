<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombreApellido',255);
            $table->string('email')->unique();
            $table->integer('telefono');
            $table->decimal('ingresosNetos',10,2);
            $table->decimal('cantidadSolicitada',10,2);
            $table->dateTime('horaComunicacion_from');
            $table->dateTime('horaComunicacion_to');
            $table->foreignId('expertos_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
