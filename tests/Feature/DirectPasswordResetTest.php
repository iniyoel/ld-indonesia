<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DirectPasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_change_password_directly_without_email_link(): void
    {
        $user = User::factory()->create([
            'email' => 'student@example.com',
            'password' => Hash::make('old-password'),
        ]);

        $response = $this->postJson('/forgot-password', [
            'email' => $user->email,
            'password' => 'new-strong-password',
            'password_confirmation' => 'new-strong-password',
        ]);

        $response->assertOk()
            ->assertJsonPath('message', 'Password berhasil diubah. Anda dapat masuk dengan password baru.');

        $user->refresh();
        $this->assertTrue(Hash::check('new-strong-password', $user->password));
        $this->assertTrue(Auth::attempt(['email' => $user->email, 'password' => 'new-strong-password']));
    }
}
