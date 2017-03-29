<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrants', function (Blueprint $table) {
            $table->string('noInvoice')->unique();
            $table->string('idMember')->nullable()->comment = "relation to table Member if member";
            $table->string('nama');
            $table->string('email');
            $table->string('institution');
            $table->string('phoneNumber');
            $table->integer('idSeminar')->unsigned();
            $table->integer('idPacks')->unsgined()->default(0)->comment = "relation to table package if any";
            $table->string('topicPlan');
            $table->string('bankFrom');
            $table->string('recFrom');
            $table->string('bankTo');
            $table->string('recTo');
            $table->integer('nominal')->default(0);
            $table->dateTime('confirmDate');
            $table->string('confirmAttach');
            $table->string('token');
            $table->primary('noInvoice');
            $table->foreign('idSeminar')->references('idSeminar')->on('seminars')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->enum("status",[0,1,2,3])->comment = "0 = New, 1 = Confirmed, 2= Waiting Approval, 3 = Canceled/Reject";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('registrants');
    }
}
