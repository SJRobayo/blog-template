<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Akisha',
            'email' => 'akisha@example.com',
        ]);
        User::factory()->create([
            'name' => 'Adrián',
            'email' => 'adri@example.com',
        ]);
        User::factory()->create([
            'name' => 'Victor Manuel',
            'email' => 'victor@example.com',
        ]);
    }
}
