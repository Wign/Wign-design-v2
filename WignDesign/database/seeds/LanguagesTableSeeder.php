<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = array(
            collect(['code' => 'da_DK', 'text' => 'dansk']),
            collect(['code' => 'en_UK', 'text' => 'english']),
            collect(['code' => 'en_US', 'text' => 'english'])
        );

        foreach ($languages as $l)  {
            \App\Language::create([
                'code' => $l->get('code'),
                'text' => $l->get('text')
            ]);
        }
    }
}
