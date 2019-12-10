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
            collect(['key' => 'list_limit', 'type' => 'INTEGER', 'value' => '30']),
        ];

        foreach ($parameters as $p) {
            Systemparameter::create([
                'key' => $p->get('key'),
                'type' => $p->get('type'),
                'value' => $p->get('value'),
            ]);
        }
    }
}
