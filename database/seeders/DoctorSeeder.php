<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\DoctorReview;
use App\Models\DoctorSchedule;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hospitals = Hospital::all();
        $user = User::where('email', 'user@medicalweb.test')->first() ?? User::where('role', 'patient')->first();

        if (!$user) {
            $user = User::create([
                'name' => 'Demo Patient',
                'email' => 'patient@demo.test',
                'password' => bcrypt('password'),
                'role' => 'patient',
            ]);
        }

        $doctorsData = [
            [
                'name' => 'Dr. Sarah Johnson',
                'specialization' => 'Senior Cardiologist',
                'degree' => 'MBBS, FCPS (Cardiology)',
                'experience_year' => 15,
                'bio' => 'Dr. Sarah Johnson is a renowned cardiologist with over 15 years of experience in treating complex heart conditions.',
            ],
            [
                'name' => 'Dr. Ahmed Khan',
                'specialization' => 'Neurologist',
                'degree' => 'MBBS, MD (Neurology)',
                'experience_year' => 12,
                'bio' => 'Specialized in treating neurological disorders, Dr. Ahmed is known for his patient-centric approach.',
            ],
            [
                'name' => 'Dr. Emily Chen',
                'specialization' => 'Pediatrician',
                'degree' => 'MBBS, DCH',
                'experience_year' => 8,
                'bio' => 'Focusing on child health and development, Dr. Emily provides compassionate care for the little ones.',
            ],
            [
                'name' => 'Dr. Michael Brown',
                'specialization' => 'Orthopedic Surgeon',
                'degree' => 'MBBS, MS (Ortho)',
                'experience_year' => 20,
                'bio' => 'Expert in joint replacements and trauma surgery with two decades of surgical experience.',
            ],
        ];

        foreach ($doctorsData as $index => $data) {
            $doctorUser = User::create([
                'name' => $data['name'],
                'email' => strtolower(str_replace(' ', '.', $data['name'])) . '@doctor.test',
                'password' => bcrypt('password'),
                'role' => 'doctor',
            ]);

            $doctor = Doctor::create(array_merge($data, [
                'user_id' => $doctorUser->id,
                'slug' => Str::slug($data['name']),
            ]));

            // Associate with 1-2 random hospitals
            $selectedHospitals = $hospitals->random(rand(1, 2));
            foreach ($selectedHospitals as $hospital) {
                $doctor->hospitals()->attach($hospital->id, ['room_no' => 'Room ' . rand(101, 505)]);

                // Create Schedules
                $days = [
                    'Saturday' => 6,
                    'Sunday' => 0,
                    'Monday' => 1,
                    'Tuesday' => 2,
                    'Wednesday' => 3,
                    'Thursday' => 4,
                    'Friday' => 5,
                ];
                $availableDays = ['Saturday', 'Monday', 'Wednesday', 'Thursday'];
                foreach (array_rand(array_flip($availableDays), 2) as $dayName) {
                    DoctorSchedule::create([
                        'doctor_id' => $doctor->id,
                        'hospital_id' => $hospital->id,
                        'day_of_week' => $days[$dayName],
                        'start_time' => '16:00:00',
                        'end_time' => '19:00:00',
                        'visit_fee' => rand(800, 1500),
                    ]);
                }
            }

            // Add a sample review
            DoctorReview::create([
                'user_id' => $user->id,
                'doctor_id' => $doctor->id,
                'rating' => rand(4, 5),
                'comment' => 'Excellent doctor! Very professional and helpful.',
            ]);
        }
    }
}
