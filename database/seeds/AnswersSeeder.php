<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Answer;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('answers')->delete();
      $json=File::get("database/json/answers.json");

      $data=json_decode($json);
      //dd($data);

    foreach ($data as $obj) {
        Answer::create(array(
          'name'=>$obj->name,
          'correctAnswer'=>$obj->correctAnswer,
          'image'=>$obj->image,
          'question_id'=>$obj->question_id));

        }
    }
}
