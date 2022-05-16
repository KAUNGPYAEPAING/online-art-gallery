<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => User::factory(),
            "title" => $this->faker->sentence(7,11),
            "post_image" => $this->faker->imageUrl('500','1000'),
            "body" => $this->faker->paragraph(),
            "price" => $this->faker->numerify('##'),
            "category_id" => Category::factory()
        ];
    }
}
