<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SolutionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('solutions')->delete();
        
        \DB::table('solutions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => '¿Por qué invertir en notas estructuradas?',
                'titulolight' => NULL,
                'titulonegrita' => NULL,
                'img' => NULL,
                'created_at' => '2022-01-12 01:52:37',
                'updated_at' => '2022-01-12 01:52:37',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => NULL,
                'titulolight' => 'LIQUIDEZ',
                'titulonegrita' => 'Recibes ganancias en periodos cortos según el rendimiento de la nota.',
                'img' => 'img/solution/61de34a241151.jpeg',
                'created_at' => '2022-01-12 01:53:38',
                'updated_at' => '2022-01-12 01:53:38',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => NULL,
                'titulolight' => 'RENTABILIDAD',
                'titulonegrita' => 'Diseñamos estrategias para maximizar el retorno de tu inversión.',
                'img' => 'img/solution/61de34c32fd04.png',
                'created_at' => '2022-01-12 01:54:11',
                'updated_at' => '2022-01-12 01:54:11',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => NULL,
                'titulolight' => 'PROTECCIÓN',
                'titulonegrita' => 'Custodiamos tu capital en el exterior y en dólares.',
                'img' => 'img/solution/61de34e261f92.png',
                'created_at' => '2022-01-12 01:54:42',
                'updated_at' => '2022-01-12 01:54:42',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}