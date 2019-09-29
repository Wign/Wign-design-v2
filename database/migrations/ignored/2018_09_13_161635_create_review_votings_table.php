<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewVotingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_votings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('review_id')->unsigned();
            $table->integer('qcv_id')->unsigned();
            $table->boolean('approve')->nullable();
            $table->timestamps();
            $table->index(['review_id', 'qcv_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_votings');
    }
}
