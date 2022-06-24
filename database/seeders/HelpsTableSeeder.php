<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HelpsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('helps')->truncate();
        
        \DB::table('helps')->insert(array (
            0 => 
            array (
                'id' => 1,
                'question' => '¿Qué son las notas estructuradas?',
                'answer' => 'Las notas estructuradas son un producto financiero alternativo de inversión que cuenta con un plazo definido para obtener una ganancia sobre el capital invertido. Se le considera como un producto híbrido ya que invierte en dos tipos de instrumentos financieros; uno de renta fija y otro de renta variable. De esta manera, mientras el instrumento de renta variable permite maximizar el rendimiento de este producto, el instrumento de renta fija mantiene el riesgo controlado.',
                'created_at' => '2022-01-12 02:04:10',
                'updated_at' => '2022-01-12 02:04:10',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'question' => '¿Cómo funciona una nota estructurada?',
                'answer' => 'La nota estructurada funciona de manera similar a un bono, son títulos emitidos por una institución financiera los cuales otorgan un rendimiento vinculado al desempeño de un activo financiero. La nota estructurada paga cupones semestrales, anuales u otro periodo con la devolución del capital a la fecha de vencimiento. A comparación de un bono, los pagos de cupón de la nota estructurada están directamente sujetos al rendimiento del activo subyacente.',
                'created_at' => '2022-01-12 02:04:23',
                'updated_at' => '2022-01-12 02:04:23',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'question' => '¿Qué es un activo subyacente?',
                'answer' => 'Los subyacentes son instrumentos financieros como: acciones, canasta de acciones, índices, monedas, materias primas, bonos, opciones y futuros. Los subyacentes se utilizan para realizar la estructuración de las notas.',
                'created_at' => '2022-01-12 02:04:44',
                'updated_at' => '2022-01-12 02:04:44',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'question' => '¿Cuál es el monto mínimos de inversión?',
                'answer' => 'El monto mínimo de inversión son USD 10,000',
                'created_at' => '2022-01-12 02:05:04',
                'updated_at' => '2022-01-12 02:05:04',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'question' => 'Si la empresa quiebra, ¿quién responde por el dinero de los que invirtieron?',
                'answer' => 'El dinero de los clientes está custodiado en entidades debidamente reguladas. Los fondos se encuentran custodiados en el prestigioso banco neoyorquino New York Mellon. Los fondos no pueden ser manipulados porque están congelados en la custodia y lo máximo que pueden perder es el riesgo de la nota.',
                'created_at' => '2022-01-12 02:05:25',
                'updated_at' => '2022-01-12 02:05:25',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'question' => '¿La empresa se encuentra regulada por la SBS, SMV o algún ente regulador?',
            'answer' => 'Todas las gestoras de fondos en el Perú están supervisadas por La Superintendencia de Banca y Seguros (SBS). Estamos asociados con Cavali conocido como el Registro Central de Valores y Liquidaciones para que la participación de los clientes quede registrada en los fondos con el apoyo del contrato que firma el cliente.',
                'created_at' => '2022-01-12 02:05:47',
                'updated_at' => '2022-01-12 02:05:47',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'question' => '¿Cómo es el proceso de inversión?',
            'answer' => 'El depósito inicial se hace a las cuentas de Prime Axxion en el Banco de Crédito del Perú (BCP). Luego, Prime Axxion envía el dinero al banco custodio New York Mellon y ahí se realiza el trade con el banco estructurador.',
                'created_at' => '2022-01-12 02:06:10',
                'updated_at' => '2022-01-12 02:06:10',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'question' => '¿Cuáles son los riesgos de la inversión?',
                'answer' => 'El riesgo de la inversión está sujeto al rendimiento de los subyacentes que forman parte de la nota estructurada seleccionada. Se perdería en el caso de que el precio de uno de los subyacentes caiga por debajo del nivel de protección de capital.',
                'created_at' => '2022-01-12 02:06:38',
                'updated_at' => '2022-01-12 02:06:38',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'question' => '¿Cobran algún tipo de comisión?',
                'answer' => 'Manejamos los costos administrativos y custodios más bajos en el mercado de productos estructurados.',
                'created_at' => '2022-01-12 02:07:00',
                'updated_at' => '2022-01-12 02:07:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}