<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class HomePageTutorsTest extends TestCase
{
    public function test_home_page_displays_tutors_from_database(): void
    {
        $tutorEmail = 'budi-' . uniqid() . '@example.com';
        $studentEmail = 'siswa-' . uniqid() . '@example.com';

        User::factory()->tutor()->create([
            'name' => 'Budi Tutor',
            'email' => $tutorEmail,
        ]);

        User::factory()->siswa()->create([
            'name' => 'Siswa Contoh',
            'email' => $studentEmail,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Budi Tutor');
        $response->assertSee('Tutor aktif');
    }
}
