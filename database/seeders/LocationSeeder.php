<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Country
        $countryId = DB::table('countries')->insertGetId([
            'name' => 'Bangladesh',
            'code' => 'BD',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Division
        $divisionId = DB::table('divisions')->insertGetId([
            'country_id' => $countryId,
            'name' => 'Dhaka',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // District
        $districtId = DB::table('districts')->insertGetId([
            'division_id' => $divisionId,
            'name' => 'Dhaka',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Thanas
        $thanas = [
            ['district_id' => $districtId, 'name' => 'Dhanmondi'],
            ['district_id' => $districtId, 'name' => 'Gulshan'],
            ['district_id' => $districtId, 'name' => 'Banani'],
            ['district_id' => $districtId, 'name' => 'Uttara'],
            ['district_id' => $districtId, 'name' => 'Mirpur'],
        ];

        foreach ($thanas as $thana) {
            DB::table('thanas')->insert(array_merge($thana, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
