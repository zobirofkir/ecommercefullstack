<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make("title")
                        ->required(),
            Textarea::make("description")
                        ->required(),
            TextInput::make("prix")
                        ->required(),
                        
            FileUpload::make('images')
                        ->multiple()
                        ->required()
                        ->preserveFilenames()
                        ->disk('public')
                        ->directory('images'),
        ])->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make("title")
                            ->searchable(),
                TextColumn::make("description")->limit(50),
                TextColumn::make("prix"),

                ImageColumn::make('images')
                            ->label('Image')
                            ->disk('public')
                            ->width(50)
                            ->height(50),

            ])->defaultSort("created_at", "desc")
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
