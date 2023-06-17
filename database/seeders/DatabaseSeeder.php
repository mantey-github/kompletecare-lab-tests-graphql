<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()
        ->create([
            'name' => 'James Doe',
            'email' => 'patient123@kompletecare.com',
            'password' => '$2y$10$eJ94dfNU8whTOWoagbAvyOdivFKKwA25/frixprMa1SeW13pQZuYS', //patient123
            'email_verified_at' => now(),
        ]);
        \App\Models\User::factory(10)->create();

        $this->call(LabTestsTableSeeder::class); 
    }
}
