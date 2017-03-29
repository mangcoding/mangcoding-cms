<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('addressId');
            $table->integer('memberid')->unsigned();
            $table->string('jalan',255);
            $table->bigInteger('village')->comment = "Desa";
            $table->integer('subdistricts')->comment = "Kecamatan";
            $table->smallInteger('district')->comment = "Kabupaten";
            $table->tinyInteger('province')->comment = "Provinsi";
            $table->integer('zipcode')->comment = "Kode Pos";
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
        Schema::drop('addresses');
    }
}
