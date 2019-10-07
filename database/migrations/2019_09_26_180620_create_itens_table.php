<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serial');
            $table->string('nome');
            $table->string('descricao');
            $table->string('status');
            $table->string('valor');
            $table->date('entrada');
            $table->string('nota');
            $table->string('tipo');
            $table->bigInteger('local_id')->unsigned();
            $table->foreign('local_id')->references('id')->on('locais');
            $table->bigInteger('setor_id')->unsigned();
            $table->foreign('setor_id')->references('id')->on('setores');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('fornecedor_id')->unsigned();
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
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
        Schema::dropIfExists('itens');
    }
}
