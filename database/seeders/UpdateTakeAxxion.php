<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UpdateTakeAxxion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('take_axxions')->where('id', 1)->update(['category_id' => 2]);
      DB::table('take_axxions')->where('id', 1)->update(['user_id' => 1]);

      DB::table('take_axxions')->where('id', 2)->update(['category_id' => 2]);
      DB::table('take_axxions')->where('id', 2)->update(['user_id' => 1]);

    }
}
