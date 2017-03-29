<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('education', function (Blueprint $table) {
            $table->increments('eduid');
            $table->integer('memberid')->unsigned();
            $table->enum('education',["SD","SMP","SMA","D1","D2","D3","D4","S1","S2","S3"]);
            $table->string('eduName',255);
            $table->string('eduMayor',255);
            $table->smallInteger('eduYear')->comment = "Tahun Masuk";
            $table->smallInteger('eduGraduated')->comment = "Tahun Lulus";
            $table->foreign('memberid')->references('memberid')->on('members')->onUpdate('cascade')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('education');
    }
}
