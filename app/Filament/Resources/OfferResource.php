<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfferResource\Pages;
use App\Filament\Resources\OfferResource\RelationManagers;
use App\Models\Offer;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OfferResource extends Resource
{
    protected static ?string $model = Offer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make("title")
                        ->required(),
            Textarea::make("description")
                        ->required(),
            TextInput::make("prix")
                        ->required()
                        ->numeric()
                        ->step(0.01), 
                        
            FileUpload::make('images')
                        ->multiple()
                        ->required()
                        ->preserveFilenames()
                        ->disk('public')
                        ->directory('offers'),
            Select::make("category_id")
                        ->relationship("category", "title")
                        ->required(),

        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make("title")
                        ->searchable(),
            TextColumn::make("description")->limit(50),
            TextColumn::make("prix")
                        ->prefix("MAD "),

            ImageColumn::make('images')
                        ->label('Image')
                        ->disk('public')
                        ->width(50)
                        ->height(50),

        ])
        ->defaultSort("created_at", "desc")

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
            'index' => Pages\ListOffers::route('/'),
            'create' => Pages\CreateOffer::route('/create'),
            'edit' => Pages\EditOffer::route('/{record}/edit'),
        ];
    }
}
