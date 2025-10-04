<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $images=['1.png','2.png','3.png','4.png','5.png','6.png'];
        return [
            'description'=>fake()->sentence(),
            'slug'=>Str::slug(fake()->sentence(6)),
            // 'image'=>'posts/'.array_rand($images)
            'image'=>'posts/'.rand(1,6).'.png'
        ];
    }
}
