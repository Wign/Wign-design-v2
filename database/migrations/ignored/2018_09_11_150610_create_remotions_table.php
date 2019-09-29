<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remotions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qcv_id')->unsigned();    // Target user
            $table->integer('creator_id')->unsigned();     // Creator
            $table->boolean('promotion');
            $table->boolean('decided')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remotions');
    }
}
