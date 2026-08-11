<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPenggunaPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_pengguna_page_displays_users_from_database(): void
    {
        $admin = User::factory()->admin()->create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
        ]);

        $tutor = User::factory()->tutor()->create([
            'name' => 'Tutor Database',
            'email' => 'tutor@example.com',
        ]);

        $student = User::factory()->siswa('A2')->create([
            'name' => 'Siswa Database',
            'email' => 'student@example.com',
            'status' => 'aktif',
        ]);

        $response = $this->actingAs($admin)->get('/admin-pengguna');

        $response->assertOk();
        $response->assertSee($tutor->name);
        $response->assertSee($student->name);
        $response->assertSee($tutor->email);
        $response->assertSee($student->email);
        $response->assertDontSee('Ari Hutabarat');
    }
}
