<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;


class AddressSeeder extends Seeder
{
    public function run()
    {
        $client = new Client();

        // Fetch and seed provinces
        $provinces = json_decode($client->get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')->getBody(), true);
        foreach ($provinces as $province) {
            DB::table('provinces')->updateOrInsert(['id' => $province['id']], ['name' => $province['name']]);
        }

        // Fetch and seed regencies
        foreach ($provinces as $province) {
            $regencies = json_decode($client->get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$province['id']}.json")->getBody(), true);
            foreach ($regencies as $regency) {
                DB::table('regencies')->updateOrInsert(['id' => $regency['id']], ['name' => $regency['name'], 'province_id' => $province['id']]);
            }
        }

        // Fetch and seed districts
        $regencies = DB::table('regencies')->get();
        foreach ($regencies as $regency) {
            $districts = json_decode($client->get("https://www.emsifa.com/api-wilayah-indonesia/api/districts/{$regency->id}.json")->getBody(), true);
            foreach ($districts as $district) {
                DB::table('districts')->updateOrInsert(['id' => $district['id']], ['name' => $district['name'], 'regency_id' => $regency->id]);
            }
        }

        // Fetch and seed villages
        $districts = DB::table('districts')->get();
        foreach ($districts as $district) {
            try {
                $villages = json_decode($client->get("https://www.emsifa.com/api-wilayah-indonesia/api/villages/{$district->id}.json")->getBody(), true);
                foreach ($villages as $village) {
                    DB::table('villages')->updateOrInsert(['id' => $village['id']], ['name' => $village['name'], 'district_id' => $district->id]);
                }
            } catch (\Exception $e) {
                $this->command->error("Failed to fetch villages for district {$district->id}: " . $e->getMessage());
            }
        }

        DB::table('addresses')->insert([
            [
                'customer_id' => 1,
                'province_id' => 12,
                'regency_id' => 34,
                'district_id' => 56,
                'village_id' => 78,
                'street' => 'Jl. Merdeka No. 1',
                'postal_code' => '12345',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'order_id' => 101,
            ],
            [
                'customer_id' => 1,
                'province_id' => 14,
                'regency_id' => 35,
                'district_id' => 57,
                'village_id' => 79,
                'street' => 'Jl. Raya No. 2',
                'postal_code' => '23456',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'order_id' => 102,
            ],
            [
                'customer_id' => 1,
                'province_id' => 16,
                'regency_id' => 36,
                'district_id' => 58,
                'village_id' => 80,
                'street' => 'Jl. Pahlawan No. 3',
                'postal_code' => '34567',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'order_id' => 103,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);

    }

    
}