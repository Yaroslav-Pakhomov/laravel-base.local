<?php

declare(strict_types = 1);

namespace Database\Factories;

use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class PostFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    #[ArrayShape([
        'title'        => "string",
        'content'      => "string",
        'image'        => "string",
        'category_id'  => "string",
        'likes'        => "string",
        'is_published' => "string"
    ])] public function definition(): array
    {
        return [
            'title'        => $this->faker->sentence(5),
            'content'      => $this->faker->text,
            'image'        => $this->faker->imageUrl(),
            'category_id'  => Category::get()->random()->id,
            'likes'        => random_int(1, 2000),
            'is_published' => 1,
        ];
    }
}
