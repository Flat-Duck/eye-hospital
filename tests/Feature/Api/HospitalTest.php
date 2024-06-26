<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hospital;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HospitalTest extends TestCase
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
    public function it_gets_hospitals_list(): void
    {
        $hospitals = Hospital::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.hospitals.index'));

        $response->assertOk()->assertSee($hospitals[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_hospital(): void
    {
        $data = Hospital::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.hospitals.store'), $data);

        $this->assertDatabaseHas('hospitals', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_hospital(): void
    {
        $hospital = Hospital::factory()->create();

        $data = [
            'name' => $this->faker->name(),
        ];

        $response = $this->putJson(
            route('api.hospitals.update', $hospital),
            $data
        );

        $data['id'] = $hospital->id;

        $this->assertDatabaseHas('hospitals', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_hospital(): void
    {
        $hospital = Hospital::factory()->create();

        $response = $this->deleteJson(
            route('api.hospitals.destroy', $hospital)
        );

        $this->assertModelMissing($hospital);

        $response->assertNoContent();
    }
}
