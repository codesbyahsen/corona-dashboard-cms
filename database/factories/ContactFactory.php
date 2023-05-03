<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->lastName(),
            'email' => fake()->unique()->email(),
            'phone' => fake()->unique()->phoneNumber(),
            'mobile' => fake()->unique()->phoneNumber(),
            'address_line_one' => fake()->streetAddress(),
            'address_line_two' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => Str::random(10),
            'country' => fake()->country(),
            'post_code' => fake()->postcode(),
            'type' => Contact::TYPE_SUB_OFFICE,
            'is_active' => Contact::STATUS_ACTIVE
        ];
    }
}
