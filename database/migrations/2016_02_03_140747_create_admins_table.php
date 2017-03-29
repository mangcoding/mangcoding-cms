<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('adminid');
            $table->string('adminName',255)->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('fullName',255);
            $table->string('phone',255);
            $table->integer('level')->unsigned();
            $table->string('avatar',255);
            $table->rememberToken();
            $table->timestamps();
            $table->enum('status',['0','1']);
            $table->foreign('level')->references('levelId')->on('levels')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admins');
    }
}
