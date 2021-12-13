<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Nosotros;

class defaultsections extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $SecionOne = Nosotros::create([
        'seccion' => 'azul', 
      ]);
      $SecionTwo = Nosotros::create([
        'seccion' => 'Fotografía Institucional', 
      ]);
      $SecionThree = Nosotros::create([
        'seccion' => 'Somos parte de', 
      ]);
      $SecionFour = Nosotros::create([
        'seccion' => 'Bancos', 
      ]);
    }
}
