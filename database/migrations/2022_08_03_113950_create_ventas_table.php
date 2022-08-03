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
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            //columna que verifica si la venta fue realizada o no
            $table->boolean('terminado')->default(false);
            $table->string('total');
            //fecha puede ser nullable porque no todos los autos tienen fecha de venta
            $table->date('fecha_venta')->nullable();
            $table->string('cliente');
            $table->string('auto');
            $table->string('modificacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};
