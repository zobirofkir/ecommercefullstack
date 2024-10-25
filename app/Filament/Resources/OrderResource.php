<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Tables\Columns\TextColumn;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Orders';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("user.name")
                            ->label("User Name")
                            ->searchable(),

                TextColumn::make("user.email")
                            ->label("User Email")
                            ->searchable(),

                TextColumn::make("orderItems.product.title")
                            ->label("Product Title")
                            ->searchable(),

                TextColumn::make("orderItems.product.quantity")
                            ->label("Product Quantity")->badge(),

            ])->defaultSort("created_at", "desc")
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make([
                    TextEntry::make('user.name')->label("User Name : "),
                    TextEntry::make('user.email')->label("User Email : "),
                    TextEntry::make('orderItems.product.title')->label("Product Title : "),
                    TextEntry::make('orderItems.product.description')->label("Product Description : "),
                    TextEntry::make('orderItems.product.quantity')->label("Product Quantity : ")->badge(),
                    TextEntry::make('orderItems.product.prix')->label("Product Price : ")->badge()->prefix("MAD "),
                    TextEntry::make('total')->label("Total : ")->badge()->prefix("MAD "),
                    
                    TextEntry::make('phone')->label("Phone: ")->badge()->color('success'),
                    TextEntry::make('address')->label("Address: ")->badge()->color('success'),
                ])
            ]);
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
