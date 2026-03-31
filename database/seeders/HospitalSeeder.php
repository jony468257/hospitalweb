<?php

namespace Database\Seeders;

use App\Models\Hospital;
use App\Models\HospitalFeature;
use App\Models\HospitalService;
use App\Models\Thana;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = User::create([
            'name' => 'Hospital Owner',
            'email' => 'owner@hospital.test',
            'password' => bcrypt('password'),
            'role' => 'hospital_owner',
        ]);

        $dhanmondi = Thana::where('name', 'Dhanmondi')->first();
        $gulshan = Thana::where('name', 'Gulshan')->first();

        $hospitals = [
            [
                'name' => 'Green Life Medical College',
                'type' => 'Private',
                'address' => '32 Bir Uttam KM Shafiullah Sarak',
                'phone' => '+880 2-9612345',
                'thana_id' => $dhanmondi->id,
                'description' => 'A leading private medical college and hospital in Dhaka, providing specialty care in various departments.',
            ],
            [
                'name' => 'Square Hospital',
                'type' => 'Private',
                'address' => '18/F, Bir Uttam Qazi Nuruzzaman Sarak',
                'phone' => '+880 2-8144400',
                'thana_id' => $dhanmondi->id,
                'description' => 'A tertiary care hospital that provides world-class healthcare services in Bangladesh.',
            ],
            [
                'name' => 'Ibn Sina Medical College Hospital',
                'type' => 'Private',
                'address' => '1/1-B, Kallyanpur',
                'phone' => '+880 1789-060123',
                'thana_id' => $dhanmondi->id,
                'description' => 'Modern healthcare facility focusing on affordable and high-quality medical services.',
            ],
            [
                'name' => 'Evercare Hospital Dhaka',
                'type' => 'Private',
                'address' => 'Plot 81, Block E, Bashundhara R/A',
                'phone' => '+880 2-8403000',
                'thana_id' => $gulshan->id,
                'description' => 'The only JCI-accredited hospital in Bangladesh, offering premium healthcare and surgical services.',
            ],
        ];

        foreach ($hospitals as $data) {
            $hospital = Hospital::create(array_merge($data, [
                'user_id' => $owner->id,
                'slug' => Str::slug($data['name']),
                'country_id' => 1, // Bangladesh
            ]));

            // Add Features
            $features = ['ICU', 'CCU', '24/7 Emergency', 'Ambulance Service', 'In-patient Pharmacy', 'Cafeteria', 'Diagnostic Lab'];
            foreach (array_rand(array_flip($features), 4) as $featureName) {
                HospitalFeature::create([
                    'hospital_id' => $hospital->id,
                    'name' => $featureName,
                ]);
            }

            // Add Services
            $services = [
                ['name' => 'General Consultation', 'price' => 800],
                ['name' => 'Cardiac Surgery', 'price' => 250000],
                ['name' => 'Neuromedicine', 'price' => 1200],
                ['name' => 'Physiotherapy', 'price' => 500],
                ['name' => 'COVID-19 Vaccination', 'price' => 0],
                ['name' => 'Maternity Care', 'price' => 25000],
                ['name' => 'Diagnostics', 'price' => 2000],
            ];
            foreach (array_rand($services, 3) as $serviceIndex) {
                HospitalService::create(array_merge($services[$serviceIndex], [
                    'hospital_id' => $hospital->id,
                ]));
            }
        }
    }
}
