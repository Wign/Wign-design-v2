<?php

use App\Systemparameter;
use Illuminate\Database\Seeder;

class SystemparameterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameters = [
            collect(['type' => 'list_limit', 'value' => '30']),
        ];

        foreach ($parameters as $p) {
            Systemparameter::create([
                'type' => $p->get('type'),
                'value' => $p->get('value'),
            ]);
        }
    }
}
