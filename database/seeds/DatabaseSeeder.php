<?php

use App\Helpers\StopWatch;
use Illuminate\Database\Eloquent\Model;
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
        StopWatch::start();
        $this->call(InitSeeder::class);
        echo 'InitSeeder completed! It took '.StopWatch::round()." seconds\n";

        $this->call(UsersTableSeeder::class);
        echo 'UserTableSeeder completed! It took '.StopWatch::round()." seconds\n";

        $this->call(LikeSeeder::class);
        echo 'LikeSeeder completed! It took '.StopWatch::round()." seconds\n";

        $this->call(RequestsTableSeeder::class);
        echo 'RequestsTableSeeder completed! It took '.StopWatch::round()." seconds\n";
        echo 'Database seed completed! It took '.StopWatch::elapsed()." seconds in total!\n\n";

        //echo "Model: visible / trashed / total seeded\n";
        echo "Model: total seeded\n";
        echo $this->output('Words', \App\Word::getModel());
        echo $this->output('Signs', \App\Sign::getModel());
        echo $this->output('Descriptions', \App\Description::getModel());
        echo $this->output('Translations', \App\Translation::getModel());
        echo $this->output('Users', \App\User::getModel());
    }

    private function output(string $name, Model $model)
    {
        //$visible = $model::all()->count();
        //$trashed = $model::onlyTrashed()->count();
        $total = $model::withTrashed()->count();

        //return "$name: $visible / $trashed / $total\n";
        return "$name: $total\n";
    }
}
