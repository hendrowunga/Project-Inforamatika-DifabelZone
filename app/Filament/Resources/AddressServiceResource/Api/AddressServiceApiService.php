<?php

namespace App\Filament\Resources\AddressServiceResource\Api;

use GuzzleHttp\Client;

class AddressServiceApiService
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getProvinces()
    {
        $response = $this->client->get('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
        $provinces = json_decode($response->getBody()->getContents(), true);

        // Kembalikan hanya ID dan Nama Provinsi
        return collect($provinces)->pluck('name', 'id')->toArray();
    }


    public function getRegencies($provinceId)
    {
        if (!$provinceId) {
            return []; // Kembalikan array kosong jika Province ID tidak ada
        }

        $response = $this->client->get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
        $regencies = json_decode($response->getBody()->getContents(), true);

        return collect($regencies)->pluck('name', 'id')->toArray();
    }

    public function getDistricts($regencyId)
    {
        if (!$regencyId) {
            return []; // Kembalikan array kosong jika Regency ID tidak ada
        }

        $response = $this->client->get("https://www.emsifa.com/api-wilayah-indonesia/api/districts/{$regencyId}.json");
        $districts = json_decode($response->getBody()->getContents(), true);

        return collect($districts)->pluck('name', 'id')->toArray();
    }

    public function getVillages($districtId)
    {
        if (!$districtId) {
            return []; // Kembalikan array kosong jika District ID tidak ada
        }

        $response = $this->client->get("https://www.emsifa.com/api-wilayah-indonesia/api/villages/{$districtId}.json");
        $villages = json_decode($response->getBody()->getContents(), true);

        return collect($villages)->pluck('name', 'id')->toArray();
    }
}
