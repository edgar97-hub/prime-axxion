<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OurDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('our_details')->truncate();
        
        \DB::table('our_details')->insert(array (
            0 => 
            array (
                'id' => 3,
                'title' => 'Bienvenido, somos Prime Axxion',
                'textcolumn1' => 'Somos una boutique financiera con proyección internacional formada por profesionales con amplia experiencia en Mercado de Valores y Wealth Management. Trabajamos de la mano con líderes internacionales en estructuración de productos financieros. Nuestra clara orientación al cliente, transparencia y nuestra constante búsqueda de la excelencia nos convierte en la elección de los inversionistas que buscan un solución inteligente y efectiva para custodiar su capital con rentabilidades superiores y bajos costos frente al mercado tradicional.',
                'textcolumn2' => 'Nuestra visión es ser la primera opción en inversiones alternativas a través de productos innovadores y efectivos. Nos caracterizamos por brindarte una asesoría personalizada, información actualizada de tus inversiones y diseñar estrategias a la medida de tus necesidades. Nuestros pilares corporativos: •	Preservación de capital •	Innovación:  •	Efectividad:',
                'nosotros_id' => 1,
                'created_at' => '2022-01-12 01:59:49',
                'updated_at' => '2022-01-12 01:59:49',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}