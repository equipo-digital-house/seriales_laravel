<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Serie;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('series')->delete();
      $json=File::get("database/json/series.json");

      $data=json_decode($json);
    //dd($data);

  foreach ($data as $obj) {
      Serie::create(array(
        'name'=>$obj->name,
        'image'=>$obj->image));
      }
    }
}
