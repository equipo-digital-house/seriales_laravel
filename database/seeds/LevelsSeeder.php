<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Levels;

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

        foreach ((array)$data as $obj) {
          Levels::create(array('name'=>$obj->name,'level'=>$obj->level,'score'=>$obj->score));
          //DB::table('levels')->insert([
          //  'name'=>'Principiante',
          //  'level'=>1,
          //  'score'=>2,
        //  ]);
        }




    }
}
