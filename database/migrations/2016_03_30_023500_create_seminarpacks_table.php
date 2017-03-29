<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarpacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminarpacks', function (Blueprint $table) {
            $table->increments('idPacks');
            $table->integer('idSeminar')->unsigned();
            $table->string('categories');
            $table->integer('price')->unsigned();
            $table->foreign('idSeminar')->references('idSeminar')->on('seminars')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seminarpacks');
    }
}
