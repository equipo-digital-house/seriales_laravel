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
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersSeeder::class);
        //$this->call(FrequentQuestionsSeeder::class);
        $this->call(SeriesSeeder::class);
        $this->call(LevelsSeeder::class);
        $this->call(QuestionsSeeder::class);
        $this->call(AnswersSeeder::class);
    }
}
