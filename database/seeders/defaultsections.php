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
        'seccion' => 'azúl', 
      ]);
      $SecionTwo = Nosotros::create([
        'seccion' => 'fotografía institucional', 
      ]);
      $SecionThree = Nosotros::create([
        'seccion' => 'somos parte de', 
      ]);
      $SecionFour = Nosotros::create([
        'seccion' => 'bancos', 
      ]);
    }
}
