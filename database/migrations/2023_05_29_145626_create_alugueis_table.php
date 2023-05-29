<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlugueisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alugueis', function (Blueprint $table) {
            $table->id();
            $table->string('dia_retirada');
            $table->string('hora_retirada');
            $table->string('dia_entrega');
            $table->string('hora_entrega');
            $table->timestamps();

            $table->unsignedBigInteger('cliente_cpf');
            $table->foreign('cliente_cpf')->references('id')->on('clientes');

            $table->unsignedBigInteger('carro_chassi');
            $table->foreign('carro_chassi')->references('id')->on('carros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alugueis');
    }
}
