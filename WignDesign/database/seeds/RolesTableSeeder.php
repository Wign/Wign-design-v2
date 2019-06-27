<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            'DEFAULT',
            'ADMIN'
        );

        foreach ($roles as $r)  {
            \App\Role::create([
                'type' => $r
            ]);
        }

    }
}
