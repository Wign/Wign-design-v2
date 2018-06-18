<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Foreigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aliases', function (Blueprint $table) {
            $table->foreign('word_id')->references('id')->on('words');
        });

        Schema::table('arts', function (Blueprint $table) {
            $table->foreign('artist_id')->references('id')->on('artists');
        });

        Schema::table('buckets', function (Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on('users');
        });

        Schema::table('descriptions', function (Blueprint $table) {
            $table->foreign('sign_id')->references('id')->on('signs');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('followers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('bucket_id')->references('id')->on('buckets');
        });

        Schema::table('glossaries', function (Blueprint $table) {
            $table->foreign('bucket_id')->references('id')->on('buckets');
            $table->foreign('sign_id')->references('id')->on('signs');
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('word_id')->references('id')->on('words');
        });

        Schema::table('signs', function (Blueprint $table) {
            $table->foreign('word_id')->references('id')->on('words');
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('taggable', function (Blueprint $table) {
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('sign_id')->references('id')->on('signs');
        });

        Schema::table('votes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sign_id')->references('id')->on('signs');
        });

        Schema::table('words', function (Blueprint $table) {
            $table->foreign('language_id')->references('id')->on('languages');
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
            $table->dropForeign(['word_id']);
        });

        Schema::table('art', function (Blueprint $table) {
            $table->dropForeign(['artist_id']);
        });

        Schema::table('buckets', function (Blueprint $table) {
            $table->dropForeign(['owner_id']);
        });

        Schema::table('descriptions', function (Blueprint $table) {
            $table->dropForeign(['word_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('followers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['bucket_id']);
        });

        Schema::table('glossaries', function (Blueprint $table) {
            $table->dropForeign(['bucket_id']);
            $table->dropForeign(['sign_id']);
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['word_id']);
        });

        Schema::table('signs', function (Blueprint $table) {
            $table->dropForeign(['word_id']);
            $table->dropForeign(['author_id']);
        });

        Schema::table('taggable', function (Blueprint $table) {
            $table->dropForeign(['tag_id']);
            $table->dropForeign(['sign_id']);
        });

        Schema::table('votes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['sign_id']);
        });

        Schema::table('words', function (Blueprint $table) {
            $table->dropForeign(['language_id']);
        });
    }
}
