<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_load_patients_index(): void
    {
        $user = User::factory()->create();
        $user->role = 'doctor';
        $response = $this->actingAs($user)->get('/patients');
        $response->assertStatus(200);
    }

    public function test_load_diseases_index(): void
    {
        $user = User::factory()->create();
        $user->role = 'doctor';
        $response = $this->actingAs($user)->get('/diseases');
        $response->assertStatus(200);
    }

    public function test_load_drugs_index(): void
    {
        $user = User::factory()->create();
        $user->role = 'doctor';
        $response = $this->actingAs($user)->get('/drugs');
        $response->assertStatus(200);
    }

    public function test_load_doctor_dashboard(): void
    {
        $user = User::factory()->create();
        $user->role = 'doctor';
        $response = $this->actingAs($user)->get('/doctor/dashboard');
        $response->assertStatus(200);
    }

    public function test_load_admin_dashboard(): void
    {
        $user = User::factory()->create();
        $user->role = 'admin';
        $response = $this->actingAs($user)->get('/admin/dashboard');
        $response->assertStatus(200);
    }

}
