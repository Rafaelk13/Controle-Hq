<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sagas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->bigInteger('quadrinho_id')->unsigned();

            $table->foreign('quadrinho_id')
                ->references('id')
                ->on('quadrinhos');

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
        Schema::dropIfExists('sagas');
    }
}
