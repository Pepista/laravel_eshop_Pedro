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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required()
                ->maxLength(255),

                Forms\Components\TextArea::make('description')
                    ->label('Description')
                    ->required()
                    ->maxLength(1000),

                    // Formulář pro cenu produktu
                    Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->required()
                    ->numeric()
                    ->step(0.01)
                    ->helperText('Enter the product price'),


            // Formulář pro dostupnost na skladě
            Forms\Components\TextInput::make('in_stock')
            ->label('In Stock')
            ->required(),
               // Formulář pro SKU (Stock Keeping Unit)
            Forms\Components\TextInput::make('sku')
                    ->label('SKU')
                    ->required()
                    ->maxLength(255),

            Forms\Components\FileUpload::make('image')
                ->label('Image')
                ->image()
                ->directory('gallery') // Určuje složku pro ukládání souboru
                ->maxSize(5120) // Maximální velikost souboru (5MB)
                ->required()
                ->helperText('Upload an image for the gallery')
                ->disk('public')
                ->columnSpan('full')
                ->afterStateUpdated(function ($state, callable $set) {
                    // Pokud je obrázek nahrán, automaticky vyplníme ostatní pole
                    if ($state) {
                        $file = $state; // Obrázek, který byl nahrán
                        $set('file_name', $file->getClientOriginalName());
                        $set('file_size', $file->getSize());
                        $set('file_format', $file->getClientOriginalExtension());
                    }
                }),

 

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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