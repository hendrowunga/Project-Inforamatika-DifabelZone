<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use GuzzleHttp\Client;
use App\Filament\Resources\AddressServiceResource\Api\AddressServiceApiService;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class AddressRelationManager extends RelationManager
{
    protected static string $relationship = 'addresses';

    // Inisialisasi AddressServiceApiService
    protected function getAddressService(): AddressServiceApiService
    {
        return new AddressServiceApiService(new Client());
    }

    // Validasi foreign keys untuk memastikan data ada di database
    protected function validateForeignKeys(array $data): void
    {
        if (!DB::table('provinces')->where('id', $data['province_id'])->exists()) {
            throw new \Exception("Invalid Province ID.");
        }
        if (!DB::table('regencies')->where('id', $data['regency_id'])->exists()) {
            throw new \Exception("Invalid Regency ID.");
        }
        if (!DB::table('districts')->where('id', $data['district_id'])->exists()) {
            throw new \Exception("Invalid District ID.");
        }
        if (!DB::table('villages')->where('id', $data['village_id'])->exists()) {
            throw new \Exception("Invalid Village ID.");
        }
    }

    // Menangani proses pembuatan alamat
    protected function handleRecordCreation(array $data): Model
    {
        $this->validateForeignKeys($data);

        $order = $this->getOwnerRecord();
        $data['customer_id'] = $order->customer_id;

        return $this->getRelationship()->create($data);
    }

    // Menangani proses update alamat
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $this->validateForeignKeys($data);
        $record->update($data);
        return $record;
    }

    // Form untuk mengatur alamat
    public function form(Forms\Form $form): Forms\Form
    {
        $addressService = $this->getAddressService();

        return $form->schema([

            Hidden::make('customer_id')
                ->default(fn() => $this->getOwnerRecord()->customer_id),

            Select::make('province_id')
                ->label('Provinsi')
                ->options(fn() => $addressService->getProvinces())
                ->reactive()
                ->afterStateUpdated(function ($state, $set) {
                    $set('regency_id', null);   // Reset pilihan kabupaten
                    $set('district_id', null);  // Reset pilihan kecamatan
                    $set('village_id', null);   // Reset pilihan desa
                })
                ->required(),

            Select::make('regency_id')
                ->label('Kabupaten/Kota')
                ->options(fn($get) => $get('province_id') ? $addressService->getRegencies($get('province_id')) : [])
                ->reactive()
                ->afterStateUpdated(function ($state, $set) {
                    $set('district_id', null);  // Reset pilihan kecamatan
                    $set('village_id', null);   // Reset pilihan desa
                })
                ->required(),

            Select::make('district_id')
                ->label('Kecamatan')
                ->options(fn($get) => $get('regency_id') ? $addressService->getDistricts($get('regency_id')) : [])
                ->reactive()
                ->afterStateUpdated(function ($state, $set) {
                    $set('village_id', null);   // Reset pilihan desa
                })
                ->required(),

            Select::make('village_id')
                ->label('Desa')
                ->options(fn($get) => $get('district_id') ? $addressService->getVillages($get('district_id')) : [])
                ->required(),

            TextInput::make('street')
                ->label('Alamat')
                ->required()
                ->maxLength(255),
        ]);
    }



    // Tabel untuk menampilkan alamat
    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('street')->label('Alamat'),
                Tables\Columns\TextColumn::make('province.name')->label('Provinsi'),
                Tables\Columns\TextColumn::make('regency.name')->label('Kabupaten/Kota'),
                Tables\Columns\TextColumn::make('district.name')->label('Kecamatan'),
                Tables\Columns\TextColumn::make('village.name')->label('Desa'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}