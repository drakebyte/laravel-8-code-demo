<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [    //  vendor/fakerphp/faker/src/Faker/Generator.php
            'name' => $this->faker->firstNameFemale,
            'email' => $this->faker->unique()->email,
            'active' => $this->faker->numberBetween(0,2),
            'image' => 'uploads/xlQD4TwEcpGrOX2j7SmFTLlMQmeCQjSL5rzLA9Lk.jpg',
            'company_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
