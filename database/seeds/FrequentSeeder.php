<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\FrequentQuestion;

class FrequentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('frequent_questions')->delete();
      $json=File::get("database/json/FrequentQuestions.json");

      $data=json_decode($json);
      //dd($data);

    foreach ($data as $obj) {
        FrequentQuestion::create(array(
          'name'=>$obj->name,
          'answer'=>$obj->answer));

        }
    }
}
