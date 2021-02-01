<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIWillGosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_will_gos', function (Blueprint $table) {
            $table->increments('id');
            $table->engine = 'InnoDB';
            $table->unsignedInteger('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('Users');
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
        Schema::dropIfExists('i_will_gos');
    }
}
