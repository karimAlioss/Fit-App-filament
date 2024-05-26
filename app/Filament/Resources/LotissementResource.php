<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LotissementResource\Pages;
use App\Filament\Resources\LotissementResource\RelationManagers;
use App\Models\Lotissement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LotissementResource extends Resource
{
    protected static ?string $model = Lotissement::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

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
            'index' => Pages\ListLotissements::route('/'),
            'create' => Pages\CreateLotissement::route('/create'),
            'edit' => Pages\EditLotissement::route('/{record}/edit'),
        ];
    }
}
