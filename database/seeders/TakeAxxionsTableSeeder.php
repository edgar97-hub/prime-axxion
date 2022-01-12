<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TakeAxxionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('take_axxions')->delete();
        
        \DB::table('take_axxions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'img' => 'img/takeaxxion/61de35c3209eb.png',
                'title' => '¿Por qué unas empresas sobreviven la pandemia y otras no? Una palabra: ‘Learnability’',
            'description' => 'Es el cambio o revolución más importante en las últimas décadas y tiene que ver justamente con estas nuevas tecnologías de la información que hoy utilizamos más y más seguido. Hagamos una pequeña prueba. Busca en Google: “Cómo vender en Mercado Libre México”. Te sorprenderá saber que encontrarás más de 64 millones de resultados (lo acabo de revisar). Mientras que si buscas solo videos sobre el tema encontrarás 1,890,000.',
                'created_at' => '2022-01-12 01:58:27',
                'updated_at' => '2022-01-12 01:58:27',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'img' => 'img/takeaxxion/61de35f5580c1.png',
                'title' => 'Exportaciones mineras cada vez más cerca a los niveles pre pandemia',
                'description' => 'A pesar de la caída de agosto, las exportaciones mineras tienen buenas perspectivas de recuperación en el cuarto trimestre, lo que se vería reflejado en la balanza comercial. La rápida recuperación de China genera perspectivas positivas para el próximo año.',
                'created_at' => '2022-01-12 01:59:17',
                'updated_at' => '2022-01-12 01:59:17',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}