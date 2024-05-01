<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'birth_date' => $this->faker->date(),
            'n_id' => $this->faker->randomNumber(),
            'gender' => \Arr::random(['male', 'female']),
            'phone' => $this->faker->phoneNumber(),
            'escort_phone' => $this->faker->text(255),
            'city_id' => \App\Models\City::factory(),
            'category' => $this->faker->text(255),
            'CO' => $this->faker->text(255),
            'PMH' => $this->faker->text(255),
            'PSH' => $this->faker->text(255),
            'DM' => $this->faker->text(255),
            'BP' => $this->faker->text(255),
            'hospital_id' => \App\Models\Hospital::factory(),
        ];
    }
}
