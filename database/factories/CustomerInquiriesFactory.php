<?php

namespace Database\Factories;

use App\Models\CustomerInquiries;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerInquiriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerInquiries::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'last_name' => $this->faker->word,
        'email' => $this->faker->word,
        'telephone' => $this->faker->randomDigitNotNull,
        'country' => $this->faker->word,
        'investor_in_financial_assests' => $this->faker->randomDigitNotNull,
        'comment' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
