<?php

use App\Role;
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
        $roles = [
            'DEFAULT',
            'ADMIN',
        ];

        foreach ($roles as $r) {
            Role::create([
                'type' => $r,
            ]);
        }
    }
}
