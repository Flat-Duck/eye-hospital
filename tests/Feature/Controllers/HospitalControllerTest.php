<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Hospital;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HospitalControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_hospitals(): void
    {
        $hospitals = Hospital::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('hospitals.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.hospitals.index')
            ->assertViewHas('hospitals');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_hospital(): void
    {
        $response = $this->get(route('hospitals.create'));

        $response->assertOk()->assertViewIs('app.hospitals.create');
    }

    /**
     * @test
     */
    public function it_stores_the_hospital(): void
    {
        $data = Hospital::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('hospitals.store'), $data);

        $this->assertDatabaseHas('hospitals', $data);

        $hospital = Hospital::latest('id')->first();

        $response->assertRedirect(route('hospitals.edit', $hospital));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_hospital(): void
    {
        $hospital = Hospital::factory()->create();

        $response = $this->get(route('hospitals.show', $hospital));

        $response
            ->assertOk()
            ->assertViewIs('app.hospitals.show')
            ->assertViewHas('hospital');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_hospital(): void
    {
        $hospital = Hospital::factory()->create();

        $response = $this->get(route('hospitals.edit', $hospital));

        $response
            ->assertOk()
            ->assertViewIs('app.hospitals.edit')
            ->assertViewHas('hospital');
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

        $response = $this->put(route('hospitals.update', $hospital), $data);

        $data['id'] = $hospital->id;

        $this->assertDatabaseHas('hospitals', $data);

        $response->assertRedirect(route('hospitals.edit', $hospital));
    }

    /**
     * @test
     */
    public function it_deletes_the_hospital(): void
    {
        $hospital = Hospital::factory()->create();

        $response = $this->delete(route('hospitals.destroy', $hospital));

        $response->assertRedirect(route('hospitals.index'));

        $this->assertModelMissing($hospital);
    }
}
