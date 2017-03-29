<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translates', function (Blueprint $table) {
            $table->increments('idtranslate');
            $table->integer('idPages')->unsigned();
            $table->string('language',3);
            $table->string('title');
            $table->string('href');
            $table->string('keywords');
            $table->string('description');
            $table->text('content');
            $table->foreign('language')->references('code')->on('languages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idPages')->references('idPages')->on('pages')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('translates');
    }
}
