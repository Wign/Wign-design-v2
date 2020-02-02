<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artist_id')->unsigned();
            $table->string('title')->nullable();
            $table->year('year')->nullable();
            $table->date('publish'); //Ferniseringsdato (ikke oprettelsesdato på Wign)
            $table->bigInteger('views')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('arts', function (Blueprint $table) {
            $table->dropForeign(['artist_id']);
        });

        Schema::dropIfExists('arts');
    }
}
