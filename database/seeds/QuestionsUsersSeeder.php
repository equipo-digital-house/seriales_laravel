<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\QuestionUser;

class QuestionsUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('question_users')->delete();
    $json=File::get("database/json/questions_users.json");

    $data=json_decode($json);
    //dd($data);

  foreach ($data as $obj) {
      QuestionUser::create(array(
        'question_id'=>$obj->question_id,
        'user_id'=>$obj->user_id,
        'answer_user'=>$obj->answer_user));


      }

    }
}
