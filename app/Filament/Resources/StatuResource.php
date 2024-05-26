<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatuResource\Pages;
use App\Filament\Resources\StatuResource\RelationManagers;
use App\Models\Statu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatuResource extends Resource
{
    protected static ?string $model = Statu::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('tag')
                        ->required(),   
                    Forms\Components\TextInput::make('color')
                        ->required(),  
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tag')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state, $record) {
                        return "<span style='background-color: {$record->color}; color: #fff; padding: 0.2em 0.4em; border-radius: 0.25em;'>{$state}</span>";
                    })
                    ->html(),
                Tables\Columns\ColorColumn::make('color'),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatus::route('/'),
            'create' => Pages\CreateStatu::route('/create'),
            'edit' => Pages\EditStatu::route('/{record}/edit'),
        ];
    }
}
