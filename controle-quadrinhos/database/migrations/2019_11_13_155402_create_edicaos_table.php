<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edicaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero');
            $table->bigInteger('saga_id')->unsigned();

            $table->foreign('saga_id')
                ->references('id')
                ->on('sagas');
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
        Schema::dropIfExists('edicaos');
    }
}
