<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'cooperative_id' => 1,
            'name' => $this->faker->name(),
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber(),
            'joining_date' => '06 Apr, 2021',
            'status' => 'Active',
            'password' => '$2y$10$HmXYGhLST.ViCbsmr4UDxeym9JTUDh2KXWbzj4G8YijEEMhAYze1y',
            'avatar' => 'https://ui-avatars.com/api/?name=Fauzan Abdillah&background=random',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        // return $this->state(function (array $attributes) {
        //     return [
        //         'email_verified_at' => null,
        //     ];
        // });
    }
}
