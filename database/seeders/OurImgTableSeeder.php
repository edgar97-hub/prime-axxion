<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OurImgTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('our_img')->truncate();
        
        \DB::table('our_img')->insert(array (
            0 => 
            array (
                'id' => 2,
                'textitle' => 'Asesoría personalizada y productos de inversión personalizados',
                'img' => 'img/nosotrosdetalles/61de364b41e45.png',
                'our_id' => 2,
                'created_at' => '2022-01-12 02:00:43',
                'updated_at' => '2022-01-12 02:00:43',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'textitle' => NULL,
                'img' => 'img/nosotrosdetalles/61de366a355cd.jpg',
                'our_id' => 3,
                'created_at' => '2022-01-12 02:01:14',
                'updated_at' => '2022-01-12 02:01:14',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'textitle' => NULL,
                'img' => 'img/nosotrosdetalles/61de3689668c4.jpg',
                'our_id' => 3,
                'created_at' => '2022-01-12 02:01:45',
                'updated_at' => '2022-01-12 02:01:45',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'textitle' => NULL,
                'img' => 'img/nosotrosdetalles/61de3699c6dcd.jpg',
                'our_id' => 3,
                'created_at' => '2022-01-12 02:02:01',
                'updated_at' => '2022-01-12 02:02:01',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 6,
                'textitle' => NULL,
                'img' => 'img/nosotrosdetalles/61de36b4f0f2b.jpg',
                'our_id' => 4,
                'created_at' => '2022-01-12 02:02:28',
                'updated_at' => '2022-01-12 02:02:28',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'textitle' => NULL,
                'img' => 'img/nosotrosdetalles/61de36c5eca34.jpg',
                'our_id' => 4,
                'created_at' => '2022-01-12 02:02:45',
                'updated_at' => '2022-01-12 02:02:45',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'textitle' => NULL,
                'img' => 'img/nosotrosdetalles/61de36d752a94.jpg',
                'our_id' => 4,
                'created_at' => '2022-01-12 02:03:03',
                'updated_at' => '2022-01-12 02:03:03',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'textitle' => NULL,
                'img' => 'img/nosotrosdetalles/61de36e7e3d68.jpg',
                'our_id' => 4,
                'created_at' => '2022-01-12 02:03:19',
                'updated_at' => '2022-01-12 02:03:19',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'textitle' => NULL,
                'img' => 'img/nosotrosdetalles/61de36fa8667e.jpg',
                'our_id' => 4,
                'created_at' => '2022-01-12 02:03:38',
                'updated_at' => '2022-01-12 02:03:38',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}