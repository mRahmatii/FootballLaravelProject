<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerrTeammTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playerr_teamm', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('teamm_id')->index();
            $table->unsignedBigInteger('playerr_id')->index();


            $table->foreign('teamm_id')->references('id')->on('teamms')->onDelete('cascade');
            $table->foreign('playerr_id')->references('id')->on('playerrs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playerr_teamm');
    }
}
