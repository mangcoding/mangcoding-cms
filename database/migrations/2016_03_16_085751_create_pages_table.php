<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('idPages');
            $table->integer('parent');
            $table->integer('orderid');
            $table->enum('featured', [0,1])->comment = "set as featured";
            $table->string('featured_img')->comment = "required if featured";
            $table->integer('pagetype')->unsigned();
            $table->integer('catid')->unsigned();
            $table->enum('topmenu', [0,1])->comment = "show in top menu";
            $table->date('eventdate')->nullable()->comment = "required if catid = 3";
            $table->integer('postby')->unsigned();
            $table->timestamps();
            $table->enum('status', [0,1]);
            $table->foreign('pagetype')->references('typeid')->on('pagetypes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('postby')->references('adminid')->on('admins')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }
}
