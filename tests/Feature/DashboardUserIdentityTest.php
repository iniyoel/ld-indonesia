<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class DashboardUserIdentityTest extends TestCase
{
    public function test_dashboard_pages_show_logged_in_user_identity(): void
    {
        $siswa = User::factory()->siswa()->create([
            'name' => 'Budi Siswa',
            'email' => 'budi-siswa-' . uniqid() . '@example.com',
        ]);

        $this->actingAs($siswa);
        $response = $this->get('/dashboard-siswa');

        $response->assertStatus(200);
        $response->assertSee('Budi Siswa');
        $response->assertSee('Siswa');
        $response->assertSee('Halo, Budi!');

        $tutor = User::factory()->tutor()->create([
            'name' => 'Tina Tutor',
            'email' => 'tina-tutor-' . uniqid() . '@example.com',
        ]);

        $this->actingAs($tutor);
        $response = $this->get('/dashboard-tutor');

        $response->assertStatus(200);
        $response->assertSee('Tina Tutor');
        $response->assertSee('Tutor');

        $admin = User::factory()->admin()->create([
            'name' => 'Arif Admin',
            'email' => 'arif-admin-' . uniqid() . '@example.com',
        ]);

        $this->actingAs($admin);
        $response = $this->get('/dashboard-admin');

        $response->assertStatus(200);
        $response->assertSee('Arif Admin');
        $response->assertSee('Admin');
    }
}
