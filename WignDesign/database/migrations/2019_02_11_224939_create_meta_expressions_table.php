<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaExpressionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_expressions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'sign_id' )->unsigned();
            $table->integer( 'handshape_id' )->unsigned()->nullable();
            //$table->integer( 'mouthing_id' )->unsigned()->nullable(); To later usage
            //$table->integer( 'movement_id' )->unsigned()->nullable(); To later usage
            $table->integer('next_expr_id')->unsigned()->nullable();
            $table->integer( 'creator_id' )->unsigned();
            $table->integer( 'editor_id' )->unsigned();
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
        Schema::dropIfExists('meta_expressions');
    }
}
