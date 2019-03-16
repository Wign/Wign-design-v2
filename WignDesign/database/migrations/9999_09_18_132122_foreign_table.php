<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignTable extends Migration
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
            $table->foreign('user_id')->references('id')->on('users');
            $table->unique(['child_word_id', 'parent_word_id']);
        });

        Schema::table('arts', function (Blueprint $table) {
            $table->foreign('artist_id')->references('id')->on('artists');
        });

        Schema::table('buckets', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('descriptions', function (Blueprint $table) {
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('editor_id')->references('id')->on('users');
        });

        Schema::table('edit_histories', function (Blueprint $table) {
            $table->foreign('old_translation_id')->references('id')->on('translations');
            $table->foreign('new_translation_id')->references('id')->on('translations');
        });

        Schema::table('glossaries', function (Blueprint $table) {
            $table->foreign('translation_id')->references('id')->on('translations');
            $table->foreign('bucket_id')->references('id')->on('buckets');
            $table->unique(['translation_id', 'bucket_id']);
        });

        Schema::table('ils', function (Blueprint $table) {
            $table->foreign('level_id')->references('id')->on('levels');
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sign_id')->references('id')->on('signs');
            $table->unique(['sign_id', 'user_id']);
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
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('remotion_votings', function (Blueprint $table) {
            $table->foreign('qcv_id')->references('id')->on('qcvs');
            $table->foreign('remotion_id')->references('id')->on('remotions');
            $table->unique(['remotion_id', 'qcv_id']);
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->foreign('word_id')->references('id')->on('words');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unique(['word_id', 'user_id']);
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('new_il_id')->references('id')->on('ils');
            $table->foreign('old_il_id')->references('id')->on('ils');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('review_votings', function (Blueprint $table) {
            $table->foreign('qcv_id')->references('id')->on('qcvs');
            $table->foreign('review_id')->references('id')->on('reviews');
            $table->unique(['review_id', 'qcv_id']);
        });

        Schema::table('signs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sign_language_id')->references('id')->on('sign_languages');
        });

        Schema::table('taggables', function (Blueprint $table) {
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('description_id')->references('id')->on('descriptions');
            $table->unique(['tag_id', 'description_id']);
        });

        Schema::table('translations', function (Blueprint $table) {
            $table->foreign('word_id')->references('id')->on('words');
            $table->foreign('sign_id')->references('id')->on('signs');
            $table->foreign('description_id')->references('id')->on('descriptions');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('editor_id')->references('id')->on('users');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::table('words', function (Blueprint $table) {
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('editor_id')->references('id')->on('users');
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
            $table->dropForeign(['user_id']);
        });

        Schema::table('arts', function (Blueprint $table) {
            $table->dropForeign(['artist_id']);
        });

        Schema::table('buckets', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('descriptions', function (Blueprint $table) {
            $table->dropForeign(['creator_id']);
            $table->dropForeign(['editor_id']);
        });

        Schema::table('edit_histories', function (Blueprint $table) {
            $table->dropForeign(['old_translation_id']);
            $table->dropForeign(['new_translation_id']);
        });

        Schema::table('glossaries', function (Blueprint $table) {
            $table->dropForeign(['translation_id']);
            $table->dropForeign(['bucket_id']);
        });

        Schema::table('ils', function (Blueprint $table) {
            $table->dropForeign(['level_id']);
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['sign_id']);
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
            $table->dropForeign(['user_id']);
        });

        Schema::table('remotion_votings', function (Blueprint $table) {
            $table->dropForeign(['remotion_id']);
            $table->dropForeign(['qcv_id']);
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->dropForeign(['word_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['new_il_id']);
            $table->dropForeign(['old_il_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('review_votings', function (Blueprint $table) {
            $table->dropForeign(['review_id']);
            $table->dropForeign(['qcv_id']);
        });

        Schema::table('signs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['sign_language_id']);
        });

        Schema::table('taggables', function (Blueprint $table) {
            $table->dropForeign(['tag_id']);
            $table->dropForeign(['description_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });

        Schema::table('words', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
            $table->dropForeign(['creator_id']);
            $table->dropForeign(['editor_id']);
        });
    }
}
