<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Patient;

use App\Models\Hospital;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_patients_list(): void
    {
        $patients = Patient::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.patients.index'));

        $response->assertOk()->assertSee($patients[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_patient(): void
    {
        $data = Patient::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.patients.store'), $data);

        unset($data['CO']);
        unset($data['PMH']);
        unset($data['PSH']);
        unset($data['DM']);
        unset($data['BP']);

        $this->assertDatabaseHas('patients', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_patient(): void
    {
        $patient = Patient::factory()->create();

        $hospital = Hospital::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'birth_date' => $this->faker->date(),
            'n_id' => $this->faker->randomNumber(),
            'gender' => \Arr::random(['male', 'female']),
            'phone' => $this->faker->phoneNumber(),
            'escort_phone' => $this->faker->text(255),
            'city' => $this->faker->city(),
            'category' => $this->faker->text(255),
            'CO' => $this->faker->text(255),
            'PMH' => $this->faker->text(255),
            'PSH' => $this->faker->text(255),
            'DM' => $this->faker->text(255),
            'BP' => $this->faker->text(255),
            'hospital_id' => $hospital->id,
        ];

        $response = $this->putJson(
            route('api.patients.update', $patient),
            $data
        );

        unset($data['CO']);
        unset($data['PMH']);
        unset($data['PSH']);
        unset($data['DM']);
        unset($data['BP']);

        $data['id'] = $patient->id;

        $this->assertDatabaseHas('patients', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_patient(): void
    {
        $patient = Patient::factory()->create();

        $response = $this->deleteJson(route('api.patients.destroy', $patient));

        $this->assertModelMissing($patient);

        $response->assertNoContent();
    }
}
