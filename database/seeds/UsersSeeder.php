<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
      $json=File::get("database/json/users.json");

      $data=json_decode($json);
      // dd($data);

    foreach ($data as $obj) {
        User::create(array(
          'name'=>$obj->name,
          'email'=>$obj->email,
          'password'=>$obj->password,
          'avatar'=>$obj->avatar,
          'role'=>$obj->role,
          'level'=>$obj->level,
          'score'=>$obj->score
        ));

        }
    }
}
