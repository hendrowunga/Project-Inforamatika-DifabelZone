<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Str; // Correct import for Str
use Filament\Forms\Components\FileUpload; // Correct import for FileUpload
use Filament\Tables\Filters\SelectFilter;





class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?int $navigationSort = 4;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([ // Membuat grup utama
                    Section::make('Product Information') // Membuat bagian dengan judul "Product Information"
                        ->schema([
                            TextInput::make('name') // Input teks untuk "name"
                                ->required() // Kolom ini wajib diisi
                                ->maxLength(255) // Maksimal karakter 255
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (string $operation, $state, $set) {
                                    if ($operation !== 'create') {
                                        return;
                                    }
                                    $set('slug', Str::slug($state));
                                }),

                            TextInput::make('slug') // Input teks untuk "slug"
                                ->required() // Kolom ini wajib diisi
                                ->maxLength(255) // Maksimal karakter 255
                                ->disabled() // Tidak dapat diubah
                                ->dehydrated()
                                ->unique(Product::class, 'slug', ignoreRecord: true),

                            MarkdownEditor::make('description') // Editor Markdown untuk deskripsi produk
                                ->columnSpanFull() // Membentangkan kolom secara penuh
                                ->fileAttachmentsDirectory('products'), // Folder penyimpanan untuk file yang diunggah
                        ])
                        ->columns(2), // Membagi schema dalam 2 kolom
                    Section::make('Images')->schema([
                        FileUpload::make('images')
                            ->multiple()
                            ->directory('products')
                            ->maxFiles(5)
                            ->reorderable()

                    ])
                ])->columnSpan(2), // Mengatur lebar grup menjadi 2 kolom
                Group::make()->schema([
                    Section::make('Price') // Membuat bagian dengan judul "Price"
                        ->schema([
                            TextInput::make('price') // Input teks untuk "price"
                                ->required() // Kolom ini wajib diisi
                                ->numeric() // Tipe // Tipe data hanya angka
                                ->minValue(0) // Nilai minimum 0
                                ->prefix('IDR '),
                        ]),
                    Section::make('Associations')->schema([
                        Select::make('category_id')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->relationship('category', 'name')
                    ]),
                    Section::make('Status')->schema([
                        Toggle::make('in_stock')
                            ->required()
                            ->default(true),

                        Toggle::make('is_active')
                            ->required()
                            ->default(true),
                        Toggle::make('is_featured')
                            ->required(),
                        // Toggle::make('on_sale')
                        //     ->required(),
                    ]),
                ])->columnSpan(1) //
            ])
            ->columns(3); // Membagi form utama menjadi 3 kolom
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('category.name')
                    ->sortable(),
                TextColumn::make('price')
                    ->money('IDR')
                    ->sortable(),
                IconColumn::make('is_featured')
                    ->boolean(),
                // IconColumn::make('on_sale')
                //     ->boolean(),
                IconColumn::make('in_stock')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                // ->toggleable(toggledHiddenByDefault: true)
                TextColumn::make('update_at')
                    ->dateTime()
                    ->sortable(),
                // ->toggleable(toggledHiddenByDefault: true)


            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name')
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}