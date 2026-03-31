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
        // System Users
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@medicalweb.test',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Test Patient',
            'email' => 'user@medicalweb.test',
            'password' => bcrypt('password'),
            'role' => 'patient',
        ]);

        // Medical Data
        $this->call([
            LocationSeeder::class,
            HospitalSeeder::class,
            DoctorSeeder::class,
            MedicineSeeder::class,
        ]);
    }
}
