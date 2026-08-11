<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTutorsTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_shows_all_active_tutors_from_database(): void
    {
        User::factory()->create([
            'name' => 'Tutor Alpha',
            'email' => 'alpha@example.com',
            'role' => 'tutor',
            'status' => 'aktif',
            'profile_photo_path' => 'profile-photos/alpha.jpg',
            'description' => 'Tutor Alpha mengajar bahasa Jerman untuk level A1 dan A2.',
        ]);

        User::factory()->create([
            'name' => 'Tutor Beta',
            'email' => 'beta@example.com',
            'role' => 'tutor',
            'status' => 'aktif',
            'profile_photo_path' => 'profile-photos/beta.jpg',
            'description' => 'Tutor Beta fokus pada persiapan ujian bahasa Jerman B1 dan B2.',
        ]);

        $response->assertSee(
            'Tutor Alpha mengajar bahasa Jerman untuk level A1 dan A2.'
        );

        $response->assertSee(
            'Tutor Beta fokus pada persiapan ujian bahasa Jerman B1 dan B2.'
        );

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Tutor Alpha');
        $response->assertSee('Tutor Beta');
        $response->assertSee('/storage/profile-photos/alpha.jpg', false);
        $response->assertSee('/storage/profile-photos/beta.jpg', false);
    }
}
