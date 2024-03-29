<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Diagnose;

use App\Models\Patient;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiagnoseTest extends TestCase
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
    public function it_gets_diagnoses_list(): void
    {
        $diagnoses = Diagnose::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.diagnoses.index'));

        $response->assertOk()->assertSee($diagnoses[0]->BCVA);
    }

    /**
     * @test
     */
    public function it_stores_the_diagnose(): void
    {
        $data = Diagnose::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.diagnoses.store'), $data);

        $this->assertDatabaseHas('diagnoses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_diagnose(): void
    {
        $diagnose = Diagnose::factory()->create();

        $patient = Patient::factory()->create();

        $data = [
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
            'patient_id' => $patient->id,
        ];

        $response = $this->putJson(
            route('api.diagnoses.update', $diagnose),
            $data
        );

        $data['id'] = $diagnose->id;

        $this->assertDatabaseHas('diagnoses', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_diagnose(): void
    {
        $diagnose = Diagnose::factory()->create();

        $response = $this->deleteJson(
            route('api.diagnoses.destroy', $diagnose)
        );

        $this->assertModelMissing($diagnose);

        $response->assertNoContent();
    }
}
