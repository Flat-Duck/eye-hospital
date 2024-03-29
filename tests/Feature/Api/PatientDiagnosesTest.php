<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Patient;
use App\Models\Diagnose;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientDiagnosesTest extends TestCase
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
    public function it_gets_patient_diagnoses(): void
    {
        $patient = Patient::factory()->create();
        $diagnoses = Diagnose::factory()
            ->count(2)
            ->create([
                'patient_id' => $patient->id,
            ]);

        $response = $this->getJson(
            route('api.patients.diagnoses.index', $patient)
        );

        $response->assertOk()->assertSee($diagnoses[0]->BCVA);
    }

    /**
     * @test
     */
    public function it_stores_the_patient_diagnoses(): void
    {
        $patient = Patient::factory()->create();
        $data = Diagnose::factory()
            ->make([
                'patient_id' => $patient->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.patients.diagnoses.store', $patient),
            $data
        );

        $this->assertDatabaseHas('diagnoses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $diagnose = Diagnose::latest('id')->first();

        $this->assertEquals($patient->id, $diagnose->patient_id);
    }
}
