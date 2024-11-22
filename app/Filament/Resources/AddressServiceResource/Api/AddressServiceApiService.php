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
        $response = $this->client->get('https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json');
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getRegencies($provinceId)
    {
        $response = $this->client->get("https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/{$provinceId}.json");
        return json_decode($response->getBody()->getContents(), true);
    }



    public function getDistricts($regencyId)
    {
        $response = $this->client->get("https://kanglerian.github.io/api-wilayah-indonesia/api/districts/{$regencyId}.json");
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getVillages($districtId)
    {
        $response = $this->client->get("https://kanglerian.github.io/api-wilayah-indonesia/api/villages/{$districtId}.json");
        return json_decode($response->getBody()->getContents(), true);
    }
}