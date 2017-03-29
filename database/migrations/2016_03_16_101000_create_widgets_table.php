<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->increments('widgetid');
            $table->string('widgetName');
            $table->string('title_en');
            $table->string('title_id');
            $table->text('widgetValue');
            $table->timestamps();
            $table->enum('status',['0','1'])->default('0')->comment = "0 = Tidak Aktif, 1 = Aktif";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('widgets');
    }
}
