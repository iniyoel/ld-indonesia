<?php

namespace Tests\Feature;

use App\Mail\UserAccountCreatedMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AdminUserCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_user_and_send_login_email(): void
    {
        Mail::fake();

        $admin = User::factory()->admin()->create();

        $photo = UploadedFile::fake()->create('tutor.png', 100, 'image/png');

        $response = $this->actingAs($admin)->post('/admin-pengguna', [
            'name' => 'Pengguna Baru',
            'email' => 'baru@example.com',
            'role' => 'tutor',
            'level' => 'A2',
            'generate_password' => true,
            'photo' => $photo,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'email' => 'baru@example.com',
            'role' => 'tutor',
            'level' => null,
        ]);

        $user = User::where('email', 'baru@example.com')->first();
        $this->assertNotNull($user->profile_photo_path);

        Mail::assertQueued(UserAccountCreatedMail::class, function (UserAccountCreatedMail $mail): bool {
            return $mail->hasTo('baru@example.com');
        });
    }
}
