<?php

use App\Level;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->smallinteger( 'rank' )->unsigned();
            $table->timestamps();
        });

        if (Level::count() == 0) {
            Artisan::call('db:seed', [
                    '--class' => 'LevelsTableSeeder',
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
        Schema::dropIfExists('levels');
    }
}
