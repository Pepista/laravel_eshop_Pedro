<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order; // Import the Order model
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\DateColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\DateFilter;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class; // Use Order model

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart'; // Change to appropriate icon
    protected static ?string $navigationLabel = 'Orders'; // Navigation label
    protected static ?string $label = 'Order'; // Singular label
    protected static ?string $pluralLabel = 'Orders'; // Plural label

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order_number')
                    ->label('Order Number')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('customer_name')
                    ->label('Customer Name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('status')
                    ->label('Order Status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('total_amount')
                    ->label('Total Amount')
                    ->required()
                    ->numeric(),

                Forms\Components\DatePicker::make('order_date')
                    ->label('Order Date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')
                    ->label('Order Number')
                    ->sortable(),

                TextColumn::make('customer_name')
                    ->label('Customer Name')
                    ->sortable(),

                BadgeColumn::make('status')
                    ->label('Status')
                    
                    
                    ->colors([
                        'pending' => 'warning',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                    ]),

                
                TextColumn::make('price')
                    ->label('Price')
                    ->sortable()
                    ->money('USD'), // Assuming USD currency, adjust if necessary
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Order Status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('pending'),

                
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add relations if any, such as order items or related models
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
