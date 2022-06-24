<?php

namespace Database\Factories;

use App\Models\Nosotrosdetalle;
use Illuminate\Database\Eloquent\Factories\Factory;

class NosotrosdetalleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nosotrosdetalle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'textcolumn1' => $this->faker->word,
        'textcolumn2' => $this->faker->word,
        'textitle' => $this->faker->word,
        'img' => $this->faker->word,
        'nosotrosde_id' => $this->faker->randomDigitNotNull,
        'nosotros_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
