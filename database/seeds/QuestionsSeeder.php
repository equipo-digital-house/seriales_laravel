<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Question;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('questions')->delete();
      $json=File::get("database/json/questions.json");

      $data=json_decode($json);
      //dd($data);

    foreach ($data as $obj) {
        Question::create(array(
          'name'=>$obj->name,
          'serie_id'=>$obj->serie_id,
          'level_id'=>$obj->level_id,
          'image'=>$obj->image));

        }

    }
}
