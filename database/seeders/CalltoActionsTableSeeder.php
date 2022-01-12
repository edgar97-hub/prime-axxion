<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CalltoActionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('callto_actions')->delete();
        
        \DB::table('callto_actions')->insert(array (
            0 => 
            array (
                'id' => 2,
                'title' => 'Contáctanos',
                'img' => 'img/callAction/61de35365e635.mp4',
                'created_at' => '2022-01-01 02:34:48',
                'updated_at' => '2022-01-12 01:56:14',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}