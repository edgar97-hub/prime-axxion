<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'created_at' => '2022-01-14 14:21:07',
                'deleted_at' => NULL,
                'id' => 1,
                'img' => 'img/takeaxxion/61e186d33614d.jpg',
                'name_category' => 'www',
                'updated_at' => '2022-01-15 02:32:49',
            ),
            1 => 
            array (
                'created_at' => '2022-01-14 15:28:53',
                'deleted_at' => NULL,
                'id' => 2,
                'img' => 'img/takeaxxion/61e196b59ed4d.jpg',
                'name_category' => 'qqq',
                'updated_at' => '2022-01-15 02:32:54',
            ),
            2 => 
            array (
                'created_at' => '2022-01-15 02:33:57',
                'deleted_at' => NULL,
                'id' => 4,
                'img' => 'img/takeaxxion/61e232a294fed.png',
                'name_category' => 'ccc',
                'updated_at' => '2022-01-15 02:34:10',
            ),
        ));
        
        
    }
}