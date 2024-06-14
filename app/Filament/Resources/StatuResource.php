<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatuResource\Pages;
use App\Models\Statu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StatuResource extends Resource
{
    protected static ?string $model = Statu::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 9;

    // Define the helper function within the class
    public static function hexToRgba($hex, $alpha = 1)
    {
        $hex = str_replace('#', '', $hex);
        $length = strlen($hex);
        $rgba = [
            'r' => hexdec($length === 6 ? substr($hex, 0, 2) : ($length === 3 ? str_repeat(substr($hex, 0, 1), 2) : 0)),
            'g' => hexdec($length === 6 ? substr($hex, 2, 2) : ($length === 3 ? str_repeat(substr($hex, 1, 1), 2) : 0)),
            'b' => hexdec($length === 6 ? substr($hex, 4, 2) : ($length === 3 ? str_repeat(substr($hex, 2, 1), 2) : 0)),
            'a' => $alpha
        ];
        return "rgba({$rgba['r']}, {$rgba['g']}, {$rgba['b']}, {$rgba['a']})";
    }


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
            ->striped()
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tag')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state, $record) {
                        $backgroundColor = self::hexToRgba($record->color, 0.7);
                        $borderColor = self::hexToRgba($record->color, 1);
                        return "<span style='background-color: {$backgroundColor}; 
                        border: 1px solid {$borderColor}; 
                        color: #fff; 
                        font-size: .8rem;
                        padding: 0.2em 0.4em; 
                        border-radius: 0.25em; 
                        display: inline-block; 
                        width: 80px; 
                        text-align: center;'>{$state}</span>";
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
