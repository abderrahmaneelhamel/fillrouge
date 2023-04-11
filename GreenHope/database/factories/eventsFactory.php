<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\events>
 */
class eventsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'organisation' => 1,
            'label' => 'help poor children get education',
            'image' => 'https://images.hindustantimes.com/rf/image_size_640x362/HT/p2/2018/10/17/Pictures/_94764270-d1cc-11e8-841e-211dfd3178e1.jpg',
            'amount' => 1000,
            'description' => 'help poor children get education man',
            'location' => 'kenya',
            'emergency' => 0,
        ];
    }
}
