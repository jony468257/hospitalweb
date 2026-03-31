<?php

namespace Database\Seeders;

use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\Thana;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = User::create([
            'name' => 'Pharmacy Owner',
            'email' => 'owner@pharmacy.test',
            'password' => bcrypt('password'),
            'role' => 'pharmacy_owner',
        ]);

        $dhanmondi = Thana::where('name', 'Dhanmondi')->first();
        $gulshan = Thana::where('name', 'Gulshan')->first();

        // Common Medicines in Bangladesh
        $medicines = [
            [
                'brand_name' => 'Napa Extend',
                'generic_name' => 'Paracetamol',
                'company' => 'Beximco Pharmaceuticals Ltd.',
                'dosage_form' => 'Tablet',
                'strength' => '665mg',
                'price' => 2.50,
            ],
            [
                'brand_name' => 'Sergel 20',
                'generic_name' => 'Esomeprazole',
                'company' => 'Healthcare Pharmaceuticals Ltd.',
                'dosage_form' => 'Capsule',
                'strength' => '20mg',
                'price' => 7.00,
            ],
            [
                'brand_name' => 'Seclo 20',
                'generic_name' => 'Omeprazole',
                'company' => 'Square Pharmaceuticals Ltd.',
                'dosage_form' => 'Capsule',
                'strength' => '20mg',
                'price' => 5.00,
            ],
            [
                'brand_name' => 'Fexo 120',
                'generic_name' => 'Fexofenadine Hydrochloride',
                'company' => 'Square Pharmaceuticals Ltd.',
                'dosage_form' => 'Tablet',
                'strength' => '120mg',
                'price' => 8.00,
            ],
            [
                'brand_name' => 'Entacyd Plus',
                'generic_name' => 'Antacid',
                'company' => 'Square Pharmaceuticals Ltd.',
                'dosage_form' => 'Suspension',
                'strength' => '200ml',
                'price' => 95.00,
            ],
            [
                'brand_name' => 'Cef-3 400',
                'generic_name' => 'Cefixime',
                'company' => 'Incepta Pharmaceuticals Ltd.',
                'dosage_form' => 'Capsule',
                'strength' => '400mg',
                'price' => 45.00,
            ],
        ];

        $medicineIds = [];
        foreach ($medicines as $med) {
            $medicine = Medicine::create($med);
            $medicineIds[] = $medicine->id;
        }

        // Pharmacies
        $pharmacies = [
            [
                'name' => 'Lazz Pharma (Dhanmondi)',
                'address' => 'House 55, Road 4/A, Dhanmondi',
                'phone' => '+880 1713-000001',
                'license_no' => 'DGDA-101-2023',
                'thana_id' => $dhanmondi->id,
            ],
            [
                'name' => 'Tamanna Pharmacy (Gulshan)',
                'address' => 'Plot 10, Road 113, Gulshan-2',
                'phone' => '+880 1713-000002',
                'license_no' => 'DGDA-102-2023',
                'thana_id' => $gulshan->id,
            ],
        ];

        foreach ($pharmacies as $data) {
            $pharmacy = Pharmacy::create(array_merge($data, [
                'user_id' => $owner->id,
                'slug' => Str::slug($data['name']),
                'country_id' => 1,
            ]));

            // Stock some medicines in each pharmacy
            $selectedMedicineIds = array_rand(array_flip($medicineIds), 4);
            foreach ($selectedMedicineIds as $id) {
                $med = Medicine::find($id);
                $pharmacy->medicines()->attach($id, [
                    'price' => $med->price,
                    'stock' => rand(50, 500),
                    'discount' => rand(0, 10),
                ]);
            }
        }
    }
}
