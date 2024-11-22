<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use GuzzleHttp\Client;
use Filament\Forms\Set;
use App\Filament\Resources\AddressServiceResource\Api\AddressServiceApiService;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Illuminate\Database\Eloquent\Model;

class AddressRelationManager extends RelationManager
{
    protected static string $relationship = 'addresses';

    public $provinceOptions = [];
    public $regencyOptions = [];
    public $districtOptions = [];
    public $villageOptions = [];

    public function boot()
    {
        $addressService = new AddressServiceApiService(new Client());
        $this->provinceOptions = collect($addressService->getProvinces())->pluck('name', 'id')->toArray();
    }

    protected function handleRecordCreation(array $data): Model
    {
        // Ambil customer_id dari order
        $order = $this->getOwnerRecord();
        if (isset($order->customer_id)) {
            $data['customer_id'] = $order->customer_id; // Pastikan field ini ada di table orders
        } else {
            // Bisa menghandle error jika customer_id tidak ada
            throw new \Exception("Customer ID is required.");
        }

        return $this->getRelationship()->create($data);
    }


    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Pastikan customer_id tetap ada saat update
        $data['customer_id'] = $record->customer_id;
        $record->update($data);
        return $record;
    }

    public function form(Form $form): Form
    {
        $order = $this->getOwnerRecord();

        return $form
            ->schema([
                // Hidden field for customer_id
                Hidden::make('customer_id')
                    ->default($order->customer_id),

                Select::make('province_id')
                    ->label('Provinsi')
                    ->options(fn() => $this->provinceOptions) // Shows the province name
                    ->reactive()
                    ->afterStateUpdated(function ($state) {
                        if ($state) {
                            $addressService = new AddressServiceApiService(new Client());
                            $this->regencyOptions = collect($addressService->getRegencies($state))
                                ->pluck('name', 'id') // Pluck name and id for regencies
                                ->toArray();
                        } else {
                            $this->regencyOptions = [];
                            $this->districtOptions = [];
                            $this->villageOptions = [];
                        }
                    })
                    ->required(),

                Select::make('regency_id')
                    ->label('Kabupaten/Kota')
                    ->options(fn() => $this->regencyOptions) // Shows the regency name
                    ->reactive()
                    ->afterStateUpdated(function ($state) {
                        if ($state) {
                            $addressService = new AddressServiceApiService(new Client());
                            $this->districtOptions = collect($addressService->getDistricts($state))
                                ->pluck('name', 'id') // Pluck name and id for districts
                                ->toArray();
                        } else {
                            $this->districtOptions = [];
                            $this->villageOptions = [];
                        }
                    })
                    ->required(),

                Select::make('district_id')
                    ->label('Kecamatan')
                    ->options(fn() => $this->districtOptions) // Shows the district name
                    ->reactive()
                    ->afterStateUpdated(function ($state) {
                        if ($state) {
                            $addressService = new AddressServiceApiService(new Client());
                            $this->villageOptions = collect($addressService->getVillages($state))
                                ->pluck('name', 'id') // Pluck name and id for villages
                                ->toArray();
                        } else {
                            $this->villageOptions = [];
                        }
                    })
                    ->required(),

                Select::make('village_id')
                    ->label('Desa')
                    ->options(fn() => $this->villageOptions) // Shows the village name
                    ->required(),

                TextInput::make('street')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('street')
                    ->label('Alamat'),

                Tables\Columns\TextColumn::make('province_id')
                    ->label('Provinsi')
                    ->formatStateUsing(fn($state) => $this->provinceOptions[$state] ?? 'Unknown'), // Show name instead of ID

                Tables\Columns\TextColumn::make('regency_id')
                    ->label('Kabupaten/Kota')
                    ->formatStateUsing(fn($state) => $this->regencyOptions[$state] ?? 'Unknown'), // Show name instead of ID

                Tables\Columns\TextColumn::make('district_id')
                    ->label('Kecamatan')
                    ->formatStateUsing(fn($state) => $this->districtOptions[$state] ?? 'Unknown'), // Show name instead of ID

                Tables\Columns\TextColumn::make('village_id')
                    ->label('Desa')
                    ->formatStateUsing(fn($state) => $this->villageOptions[$state] ?? 'Unknown'), // Show name instead of ID
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