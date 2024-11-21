<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Number;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\ToggleButtons;
use App\Filament\Resources\OrderResource\Pages;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;





class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Order Information')->schema([
                        Select::make('customer_id')
                            ->label('Customer')
                            ->relationship('customer', 'username')
                            ->searchable()
                            ->preload()
                            ->required(),


                        Select::make('payment_method')
                            ->options([
                                'stripe' => 'Stripe',
                                'cod' => 'Cash on Delivery',
                            ])->required(),


                        Select::make('payment_status')
                            ->options([
                                'pending' => 'Pending',
                                'paid' => 'Paid',
                                'failed' => 'Filed',
                            ])
                            ->default('pending')
                            ->required(),

                        ToggleButtons::make('status')
                            ->inline()
                            ->default('new')
                            ->required()
                            ->options([
                                'new' => 'New',
                                'processing' => 'Processing',
                                'shipped' => 'Shipped',
                                'delivered' => 'Delivered',
                                'cancelled' => 'Cancelled',
                            ])
                            ->colors([
                                'new' => 'info',
                                'processing' => 'warning',
                                'shipped' => 'success',
                                'delivered' => 'success',
                                'cancelled' => 'danger',
                            ])
                            ->icons([
                                'new' => 'heroicon-m-sparkles',
                                'processing' => 'heroicon-m-arrow-path',
                                'shipped' => 'heroicon-m-truck',
                                'delivered' => 'heroicon-m-check-badge',
                                'cancelled' => 'heroicon-m-x-circle',
                            ]),
                        Select::make('shipping_method')
                            ->options([
                                'jne' => 'JNE',
                                'j&t-express' => 'J&T Express',
                                'tiki' => 'Tiki',
                            ]),

                        Textarea::make('notes')
                            ->columnSpanFull(),
                    ])->columns(2),

                    Section::make('Order Item')
                        ->schema([
                            Repeater::make('items')
                                ->relationship()
                                ->schema([
                                    Select::make('product_id')
                                        ->relationship('product', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->distinct()
                                        ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                        ->columnSpan(4)
                                        ->reactive()
                                        //
                                        ->afterStateUpdated(function ($state, Set $set) {
                                            $product = Product::find($state);
                                            $set('unit_amount', $product?->price ?? 0);
                                            $set('total_amount', ($product?->price ?? 0) * $set('quantity', 1)); // Set default quantity to 1
                                        }),

                                    TextInput::make('quantity')
                                        ->numeric()
                                        ->required()
                                        ->default(1)
                                        ->minValue(1)
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                            $unitPrice = $get('unit_amount');
                                            $set('total_amount', $state * $unitPrice);
                                        })
                                        ->columnSpan(2),

                                    TextInput::make('unit_amount')
                                        ->numeric()
                                        ->required()
                                        ->disabled()
                                        ->dehydrated()
                                        ->columnSpan(3),
                                    TextInput::make('total_amount')
                                        ->numeric()
                                        ->required()
                                        ->dehydrated()
                                        ->columnSpan(3),

                                ])->columns(12),
                            Placeholder::make('grand_total_placeholder')
                                ->label('Grand Total')
                                ->content(function (Get $get, Set $set) {
                                    $total = 0;
                                    if (!$items = $get('items')) {
                                        return $total;
                                    }

                                    foreach ($items as $key => $item) {
                                        $total += $get("items.{$key}.total_amount");
                                    }

                                    $set('grand_total', $total); // Update hidden field
                                    return 'IDR ' . number_format($total, 0, ',', '.');
                                }),

                            Hidden::make('grand_total')
                                ->default(0)
                                ->dehydrated(),
                        ]),
                ])->columnSpanFull()
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.username')
                    ->label('Customer')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('grand_total')
                    ->numeric()
                    ->sortable()
                    ->money('IDR'),

                TextColumn::make('payment_method')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('payment_status')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('shipping_method')
                    ->sortable()
                    ->searchable(),

                SelectColumn::make('status')
                    ->options([
                        'new' => 'New',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled',
                    ])
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('update_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),




            ])
            ->filters([
                //
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
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationColor(): string|array|null
    {
        return static::getModel()::count() > 10 ? 'success' : 'danger';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
