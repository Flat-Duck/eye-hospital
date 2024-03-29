<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hospital;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HospitalUsersTest extends TestCase
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
    public function it_gets_hospital_users(): void
    {
        $hospital = Hospital::factory()->create();
        $users = User::factory()
            ->count(2)
            ->create([
                'hospital_id' => $hospital->id,
            ]);

        $response = $this->getJson(
            route('api.hospitals.users.index', $hospital)
        );

        $response->assertOk()->assertSee($users[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_hospital_users(): void
    {
        $hospital = Hospital::factory()->create();
        $data = User::factory()
            ->make([
                'hospital_id' => $hospital->id,
            ])
            ->toArray();
        $data['password'] = \Str::random('8');

        $response = $this->postJson(
            route('api.hospitals.users.store', $hospital),
            $data
        );

        unset($data['password']);
        unset($data['email_verified_at']);

        $this->assertDatabaseHas('users', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $user = User::latest('id')->first();

        $this->assertEquals($hospital->id, $user->hospital_id);
    }
}
