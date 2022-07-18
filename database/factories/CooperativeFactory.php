<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CooperativeFactory extends Factory
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
            'name' => 'Force Medicines',
            'since_year' => 1987,
            'owner_name' => 'David Marshall',
            'company_name' => 'Partnership',
            'email' => 'forcemedicines@gamil.com',
            'website' => 'www.forcemedicines.com',
            'contact' => '+(123) 9876 654 321',
            'fax' => '+1 999 876 5432',
            'location' => 'United Kingdom',
            'avatar' => 'assets/images/companies/img-2.png',
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
