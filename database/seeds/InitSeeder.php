<?php

use App\Language;
use App\Role;
use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::count() == 0) {
            $this->call(RolesTableSeeder::class);
        }

        if (Language::count() == 0) {
            $this->call(LanguagesTableSeeder::class);
        }

        if (\App\Systemparameter::count() == 0) {
            $this->call(SystemparameterTableSeeder::class);
        }

        /* THOSE BELOW IS IGNORED FOR NOW!
         * Uncomment those as they become active

        if (Level::count() == 0) {
            $this->call(LevelsTableSeeder::class);
        }

        */
    }
}
