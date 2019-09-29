<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InitSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RequestsTableSeeder::class);
        //$this->call(TranslationsTableSeeder::class);

        echo "Model: visible / trashed / total seeded\n";
        echo 'Words: '.\App\Word::count().' / '.\App\Word::onlyTrashed()->count().' / '.\App\Word::withTrashed()->count()."\n";
        echo 'Signs: '.\App\Sign::count().' / '.\App\Sign::onlyTrashed()->count().' / '.\App\Sign::withTrashed()->count()."\n";
        echo 'Descriptions: '.\App\Description::count().' / '.\App\Description::onlyTrashed()->count().' / '.\App\Description::withTrashed()->count()."\n";
        echo 'Translations: '.\App\Translation::count().' / '.\App\Translation::onlyTrashed()->count().' / '.\App\Translation::withTrashed()->count()."\n";
        echo 'Users: '.\App\User::count().' / '.\App\User::onlyTrashed()->count().' / '.\App\User::withTrashed()->count()."\n";
    }
}
