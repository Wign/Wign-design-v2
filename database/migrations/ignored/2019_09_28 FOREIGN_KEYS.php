<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aliases', function (Blueprint $table) {
            $table->foreign('child_word_id')->references('id')->on('words');
            $table->foreign('parent_word_id')->references('id')->on('words');
            $table->foreign('creator_id')->references('id')->on('users');
        });

        Schema::table('ban_users', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('buckets', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('glossaries', function (Blueprint $table) {
            $table->foreign('translation_id')->references('id')->on('translations');
            $table->foreign('bucket_id')->references('id')->on('buckets');
        });

        Schema::table('meta_expressions', function (Blueprint $table) {
            $table->foreign('sign_id')->references('id')->on('signs');
            $table->foreign('expression_id')->references('id')->on('expressions');
            $table->foreign('handshape_id')->references('id')->on('handshapes');
            $table->foreign('mouthing_id')->references('id')->on('mouthings');
            //$table->foreign('next_expr_id')->references('id')->on('meta_expressions');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('editor_id')->references('id')->on('users');
        });

        Schema::table('qcvs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('level_id')->references('id')->on('levels');
        });

        Schema::table('remotions', function (Blueprint $table) {
            $table->foreign('qcv_id')->references('id')->on('qcvs');
            $table->foreign('creator_id')->references('id')->on('users');
        });

        Schema::table('remotion_votings', function (Blueprint $table) {
            $table->foreign('qcv_id')->references('id')->on('qcvs');
            $table->foreign('remotion_id')->references('id')->on('remotions');
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('new_il_id')->references('id')->on('translations');
            $table->foreign('old_il_id')->references('id')->on('translations');
            $table->foreign('creator_id')->references('id')->on('users');
        });

        Schema::table('review_votings', function (Blueprint $table) {
            $table->foreign('qcv_id')->references('id')->on('qcvs');
            $table->foreign('review_id')->references('id')->on('reviews');
        });

        Schema::table('ils', function (Blueprint $table) {
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('translation_id')->references('id')->on('translations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aliases', function (Blueprint $table) {
            $table->dropForeign(['child_word_id']);
            $table->dropForeign(['parent_word_id']);
            $table->dropForeign(['creator_id']);
        });

        Schema::table('ban_users', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('buckets', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('glossaries', function (Blueprint $table) {
            $table->dropForeign(['translation_id']);
            $table->dropForeign(['bucket_id']);
        });

        Schema::table('meta_expressions', function (Blueprint $table) {
            $table->dropForeign(['sign_id']);
            $table->dropForeign(['expression_id']);
            $table->dropForeign(['handshape_id']);
            $table->dropForeign(['mouthing_id']);
            //$table->dropForeign(['next_expr_id']);
            $table->dropForeign(['creator_id']);
            $table->dropForeign(['editor_id']);
        });

        Schema::table('qcvs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['level_id']);
        });

        Schema::table('remotions', function (Blueprint $table) {
            $table->dropForeign(['qcv_id']);
            $table->dropForeign(['creator_id']);
        });

        Schema::table('remotion_votings', function (Blueprint $table) {
            $table->dropForeign(['remotion_id']);
            $table->dropForeign(['qcv_id']);
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['new_il_id']);
            $table->dropForeign(['old_il_id']);
            $table->dropForeign(['creator_id']);
        });

        Schema::table('review_votings', function (Blueprint $table) {
            $table->dropForeign(['review_id']);
            $table->dropForeign(['qcv_id']);
        });

        Schema::table('ils', function (Blueprint $table) {
            $table->dropForeign(['level_id']);
            $table->dropForeign(['translation_id']);
        });
    }
}
