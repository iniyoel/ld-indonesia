<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_accepts_demo_password_variants_for_seeded_accounts(): void
    {
        $user = User::factory()->admin()->create([
            'name' => 'Admin Demo',
            'email' => 'admin@ldindonesia.test',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/masuk', [
            'email' => $user->email,
            'password' => 'passowrd',
        ]);

        $response->assertRedirect('/dashboard-admin');
        $this->assertAuthenticatedAs($user);
    }
}
