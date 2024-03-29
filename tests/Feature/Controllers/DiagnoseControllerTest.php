<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Diagnose;

use App\Models\Patient;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiagnoseControllerTest extends TestCase
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
    public function it_displays_index_view_with_diagnoses(): void
    {
        $diagnoses = Diagnose::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('diagnoses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.diagnoses.index')
            ->assertViewHas('diagnoses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_diagnose(): void
    {
        $response = $this->get(route('diagnoses.create'));

        $response->assertOk()->assertViewIs('app.diagnoses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_diagnose(): void
    {
        $data = Diagnose::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('diagnoses.store'), $data);

        $this->assertDatabaseHas('diagnoses', $data);

        $diagnose = Diagnose::latest('id')->first();

        $response->assertRedirect(route('diagnoses.edit', $diagnose));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_diagnose(): void
    {
        $diagnose = Diagnose::factory()->create();

        $response = $this->get(route('diagnoses.show', $diagnose));

        $response
            ->assertOk()
            ->assertViewIs('app.diagnoses.show')
            ->assertViewHas('diagnose');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_diagnose(): void
    {
        $diagnose = Diagnose::factory()->create();

        $response = $this->get(route('diagnoses.edit', $diagnose));

        $response
            ->assertOk()
            ->assertViewIs('app.diagnoses.edit')
            ->assertViewHas('diagnose');
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

        $response = $this->put(route('diagnoses.update', $diagnose), $data);

        $data['id'] = $diagnose->id;

        $this->assertDatabaseHas('diagnoses', $data);

        $response->assertRedirect(route('diagnoses.edit', $diagnose));
    }

    /**
     * @test
     */
    public function it_deletes_the_diagnose(): void
    {
        $diagnose = Diagnose::factory()->create();

        $response = $this->delete(route('diagnoses.destroy', $diagnose));

        $response->assertRedirect(route('diagnoses.index'));

        $this->assertModelMissing($diagnose);
    }
}
