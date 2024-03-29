<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Patient;
use App\Models\Hospital;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HospitalPatientsTest extends TestCase
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
    public function it_gets_hospital_patients(): void
    {
        $hospital = Hospital::factory()->create();
        $patients = Patient::factory()
            ->count(2)
            ->create([
                'hospital_id' => $hospital->id,
            ]);

        $response = $this->getJson(
            route('api.hospitals.patients.index', $hospital)
        );

        $response->assertOk()->assertSee($patients[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_hospital_patients(): void
    {
        $hospital = Hospital::factory()->create();
        $data = Patient::factory()
            ->make([
                'hospital_id' => $hospital->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.hospitals.patients.store', $hospital),
            $data
        );

        $this->assertDatabaseHas('patients', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $patient = Patient::latest('id')->first();

        $this->assertEquals($hospital->id, $patient->hospital_id);
    }
}
