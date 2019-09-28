<?php

use App\Level;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 5; $i++) {
            Level::create([
                'rank' => $i,
            ]);
        }
    }
}
