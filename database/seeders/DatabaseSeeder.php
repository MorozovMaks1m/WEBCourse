<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Work;
use App\Models\Education;
use App\Models\Thesis;
use App\Models\WorkProject;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Education::factory(5)->create();
        Thesis::factory(5)->create();
        Work::factory(5)->create();
        WorkProject::factory(20)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
