<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('arts', function (Blueprint $table) {
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');;
        });

        Schema::table('descriptions', function (Blueprint $table) {
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('editor_id')->references('id')->on('users');
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('sign_id')->references('id')->on('signs')->onDelete('CASCADE');
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->foreign('word_id')->references('id')->on('words')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });

        Schema::table('signs', function (Blueprint $table) {
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('language_id')->references('id')->on('languages');
        });

        Schema::table('taggables', function (Blueprint $table) {
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('description_id')->references('id')->on('descriptions')->onDelete('CASCADE');
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
        Schema::table('arts', function (Blueprint $table) {
            $table->dropForeign(['artist_id']);
        });

        Schema::table('descriptions', function (Blueprint $table) {
            $table->dropForeign(['creator_id']);
            $table->dropForeign(['editor_id']);
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['sign_id']);
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->dropForeign(['word_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('signs', function (Blueprint $table) {
            $table->dropForeign(['creator_id']);
            $table->dropForeign(['language_id']);
        });

        Schema::table('taggables', function (Blueprint $table) {
            $table->dropForeign(['tag_id']);
            $table->dropForeign(['description_id']);
        });

        Schema::table('translations', function (Blueprint $table) {
            $table->dropForeign(['word_id']);
            $table->dropForeign(['sign_id']);
            $table->dropForeign(['description_id']);
            $table->dropForeign(['creator_id']);
            $table->dropForeign(['editor_id']);
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
