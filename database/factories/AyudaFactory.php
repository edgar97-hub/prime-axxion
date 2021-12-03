<?php

namespace Database\Factories;

use App\Models\Ayuda;
use Illuminate\Database\Eloquent\Factories\Factory;

class AyudaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ayuda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pregunta' => $this->faker->word,
        'respuesta' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
