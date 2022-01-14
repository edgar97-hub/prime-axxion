<?php

namespace Database\Factories;

use App\Models\TakeAxxion;
use Illuminate\Database\Eloquent\Factories\Factory;

class TakeAxxionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TakeAxxion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomDigitNotNull,
        'level' => $this->faker->randomElement(['basic', 'intermediate', 'advanced']),
        'number_visits' => $this->faker->randomDigitNotNull,
        'title' => $this->faker->text,
        'user_id' => $this->faker->randomDigitNotNull,
        'light_text_1' => $this->faker->word,
        'img_1' => $this->faker->word,
        'light_text_2' => $this->faker->word,
        'img_2' => $this->faker->word,
        'light_text_3' => $this->faker->word,
        'body' => $this->faker->word,
        'video' => $this->faker->word,
        'podcast' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
