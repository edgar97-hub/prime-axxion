<?php

namespace Database\Factories;

use App\Models\Img;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImgFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Img::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'textitle' => $this->faker->word,
        'img' => $this->faker->word,
        'our_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
