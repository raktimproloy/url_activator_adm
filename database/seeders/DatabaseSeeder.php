<?php

namespace Database\Seeders;

use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin::factory(10)->create();

        Admin::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@example.com',
        ]);
    }
}
