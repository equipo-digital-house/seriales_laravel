<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Level;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->delete();
      $json=File::get("database/json/levels.json");

      $data=json_decode($json);
      //dd($data);

    foreach ($data as $obj) {
        Level::create(array(
          'name'=>$obj->name,
          'level'=>$obj->level,
          'score'=>$obj->score));

        }

    }
}
