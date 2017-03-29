<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('catid');
            $table->integer('typeid')->unsigned();
            $table->string('cat_en');
            $table->string('cat_id');
            $table->string('description_en');
            $table->string('description_id');
            $table->enum('status',['0','1']);
            $table->timestamps();
            $table->foreign('typeid')->references('typeid')->on('pagetypes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
