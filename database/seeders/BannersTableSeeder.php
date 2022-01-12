<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('banners')->delete();
        
        \DB::table('banners')->insert(array (
            0 => 
            array (
                'id' => 1,
                'titulolight' => 'Tu tranquilidad',
                'titulonegrita' => 'Es nuestra misión',
                'textogeneral' => 'Gestionamos tus fondos a través de notas estructuradas, una alternativa de inversión de clase mundial.',
                'img' => 'img/banner/61de33dfcb71d.png',
                'created_at' => '2022-01-08 22:31:23',
                'updated_at' => '2022-01-12 01:50:23',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'titulolight' => 'Tus metas',
                'titulonegrita' => 'Nuestra inspiración',
                'textogeneral' => 'Diseñamos tu futuro con las mejores oportunidades del mercado internacional.',
                'img' => 'img/banner/61de341088bc8.jpeg',
                'created_at' => '2022-01-12 01:51:12',
                'updated_at' => '2022-01-12 01:51:12',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'titulolight' => 'Tu seguridad',
                'titulonegrita' => 'Nuestro compromiso',
                'textogeneral' => 'Protegemos tu capital en el exterior con una sólida gestión del riesgo',
                'img' => 'img/banner/61de34500d9bb.jpeg',
                'created_at' => '2022-01-12 01:52:16',
                'updated_at' => '2022-01-12 01:52:16',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}