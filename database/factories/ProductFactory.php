<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {

        $data =  Category::all($columns = ['id']);
        return [
            //
            'title' => $this->faker->word(),
            'image' => $this->faker->image(),
            'old_price' => $this->faker->randomDigitNotNull(),
            'new_price' => $this->faker->randomDigitNotNull(),
            'description' => $this->faker->sentence(),
            'skv' => $this->faker->word(),
            'in_stock' => $this->faker->boolean(),
            'category_id' => $this->faker->randomElement($data),
        ];
    }
}
