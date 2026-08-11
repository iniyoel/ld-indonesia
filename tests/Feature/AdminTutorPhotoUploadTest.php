<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdminTutorPhotoUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_tutor_with_photo_upload(): void
    {
        $admin = User::factory()->admin()->create();

        $photo = UploadedFile::fake()->create('tutor.png', 100, 'image/png');

        $response = $this->actingAs($admin)->post('/admin-pengguna', [
            'name' => 'Tutor Baru',
            'email' => 'tutor.baru@example.com',
            'role' => 'tutor',
            'generate_password' => true,
            'photo' => $photo,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'email' => 'tutor.baru@example.com',
            'role' => 'tutor',
        ]);

        $user = User::where('email', 'tutor.baru@example.com')->first();
        $this->assertNotNull($user->profile_photo_path);
    }
}
