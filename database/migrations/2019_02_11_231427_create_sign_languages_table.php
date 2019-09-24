<?php

use App\SignLanguage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('text');
        });

        if (SignLanguage::count() == 0) {
            Artisan::call('db:seed', [
                    '--class' => 'SignLanguagesTableSeeder',
                    '--force' => true]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sign_languages');
    }
}
