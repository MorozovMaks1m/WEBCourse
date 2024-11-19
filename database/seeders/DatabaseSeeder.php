<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Work;
use App\Models\Education;
use App\Models\Thesis;
use App\Models\WorkProject;
use App\Models\Skill;
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
        WorkProject::factory(10)->create();
        Skill::factory(25)->create();

        foreach(Thesis::all() as $thesis) {
            $list_of_skills = Skill::inRandomOrder()->take(random_int(3,6))->get();
            $thesis->skills()->attach($list_of_skills);
        }

        foreach(WorkProject::all() as $workproject) {
            $list_of_skills = Skill::inRandomOrder()->take(random_int(1,3))->get();
            $workproject->skills()->attach($list_of_skills);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
