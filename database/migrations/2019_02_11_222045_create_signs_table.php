<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignsTable extends Migration
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
            $table->string( 'video_uuid' )->unique();
            $table->string( 'video_url' );
            $table->string( 'thumbnail_url' );
            $table->string( 'small_thumbnail_url' );
            $table->integer( 'playings' )->default(0);
            $table->integer('sign_language_id')->unsigned();
            $table->integer( 'user_id' )->unsigned();   // creator
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
        Schema::dropIfExists('signs');
    }
}
