<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextArea::make('email')
                    ->label('Email')
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

                // Další pole pro file_name, file_size a file_format, která se vyplní automaticky
                Forms\Components\TextInput::make('file_name')
                    ->label('File Name')
                    ->disabled() // Pole bude automaticky vyplněno
                    ->default(fn ($get) => $get('image') ? $get('image')->getClientOriginalName() : null),

                Forms\Components\TextInput::make('file_size')
                    ->label('File Size')
                    ->disabled() // Pole bude automaticky vyplněno
                    ->default(fn ($get) => $get('image') ? $get('image')->getSize() : null),

                Forms\Components\TextInput::make('file_format')
                    ->label('File Format')
                    ->disabled() // Pole bude automaticky vyplněno
                    ->default(fn ($get) => $get('image') ? $get('image')->getClientOriginalExtension() : null),
         
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}