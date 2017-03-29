<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeminarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminars', function (Blueprint $table) {
            $table->increments('idSeminar');
            $table->string('title');
            $table->text('description');
            $table->date('eventDate');
            $table->string('eventHours');
            $table->date('openRegist');
            $table->date('closeRegist');
            $table->string('place');
            $table->string('images');
            $table->string('contact');
            $table->enum('package',[0,1])->default(0)->comment = "Change to 1 if you need any package";
            $table->integer('price')->unsigned()->default(0);
            $table->integer('memberPrice')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('seminars');
    }
}
