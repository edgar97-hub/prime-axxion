<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OurInformationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('our_information')->delete();
        
        \DB::table('our_information')->insert(array (
            0 => 
            array (
                'id' => 1,
                'seccion' => 'azul',
                'created_at' => '2021-12-31 22:39:38',
                'updated_at' => '2021-12-31 22:39:38',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'seccion' => 'Fotografía Institucional',
                'created_at' => '2021-12-31 22:39:38',
                'updated_at' => '2021-12-31 22:39:38',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'seccion' => 'Somos parte de',
                'created_at' => '2021-12-31 22:39:38',
                'updated_at' => '2021-12-31 22:39:38',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'seccion' => 'Bancos',
                'created_at' => '2021-12-31 22:39:38',
                'updated_at' => '2021-12-31 22:39:38',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}