<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('memberid');
            $table->string('idMember')->unique()->nullable();
            $table->string('prefix',255)->comment = "Gelar didepan Nama";
            $table->string('fullName',255);
            $table->string('subfix',255)->comment = "Gelar dibelakang Nama";
            $table->enum('gender',['L','P']);
            $table->string('birthPlace',255);
            $table->date('birthDate');
            $table->string('civilizationNo',50)->comment = 'No. KTP';
            $table->enum('education',["SD","SMP","SMA","D1","D2","D3","D4","S1","S2","S3"]);
            $table->string('certificated');
            $table->integer('startYear');
            $table->string('companyName');
            $table->string('position');
            $table->string('phone');
            $table->string('homePhone');
            $table->string('officePhone');
            $table->string('email',50);
            $table->string('avatar',255);
            $table->enum('status',['0','1'])->default('0')->comment = "0 = Tidak Aktif, 1 = Aktif";
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('members');
    }
}
