<?php

namespace Database\Factories;

use App\Models\Diagnose;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiagnoseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diagnose::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'eye' => 'Left',
            'BCVA' => $this->faker->text(255),
            'IOP' => $this->faker->text(255),
            'LID' => $this->faker->text(255),
            'conjunctiva' => $this->faker->text(255),
            'cornea' => $this->faker->text(255),
            'AC' => $this->faker->text(255),
            'IrisPupil' => $this->faker->text(255),
            'lens' => $this->faker->text(255),
            'fundus' => $this->faker->text(255),
            'remarks' => $this->faker->text(),
            'diagnosis' => $this->faker->text(),
            'US' => $this->faker->text(255),
            'OCT' => $this->faker->text(255),
            'pantacam' => $this->faker->text(255),
            'patient_id' => \App\Models\Patient::factory(),
        ];
    }
}
