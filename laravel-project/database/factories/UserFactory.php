<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => 'siswa',
            'level' => fake()->randomElement(['A1', 'A2', 'B1', 'B2']),
            'status' => 'aktif',
            'aktif_sampai' => now()->addMonth(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /** Akun admin: tanpa level, tanpa batas masa aktif. */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
            'level' => null,
            'aktif_sampai' => null,
        ]);
    }

    /** Akun tutor: tanpa level, tanpa batas masa aktif. */
    public function tutor(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'tutor',
            'level' => null,
            'aktif_sampai' => null,
        ]);
    }

    /** Akun siswa dengan level tertentu, aktif 1 bulan sejak sekarang. */
    public function siswa(?string $level = null): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'siswa',
            'level' => $level ?? fake()->randomElement(['A1', 'A2', 'B1', 'B2']),
            'status' => 'aktif',
            'aktif_sampai' => now()->addMonth(),
        ]);
    }

    /** Akun siswa yang masa aktifnya sudah lewat (belum diperpanjang admin). */
    public function nonAktif(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'non_aktif',
            'aktif_sampai' => now()->subDays(3),
        ]);
    }
}
