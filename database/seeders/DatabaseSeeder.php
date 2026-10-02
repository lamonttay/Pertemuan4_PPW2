<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => bcrypt('password')]
        );

        \App\Models\Post::create([
            'title'       => 'Post Pertama (Draft)',
            'description' => 'Ini adalah postingan contoh dengan status draft.',
            'status'      => 'draft',
        ]);

        \App\Models\Post::create([
            'title'       => 'Post Kedua (Published)',
            'description' => 'Ini adalah postingan contoh dengan status published.',
            'status'      => 'published',
        ]);
    }
}
