<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Signs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('word_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->string('video_url');
            $table->uuid('video_uuid');
            $table->string('thumbnail_url');
            $table->string('thumbnail_small_url');
            $table->integer('playings');
            $table->ipAddress('flag_ip');
            $table->string('flag_reason');
            $table->text('flag_comment');
            $table->string('flag_email');
            $table->integer('score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signs');
    }
}
