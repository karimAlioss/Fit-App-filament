<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LotissementResource\Pages;
use App\Models\Lotissement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LotissementResource extends Resource
{
    protected static ?string $model = Lotissement::class;
    protected static ?string $navigationIcon = 'heroicon-o-swatch';
    protected static ?string $navigationGroup = 'Managements';
    protected static ?string $recordTitleAttribute = 'titre';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('titre')
                        ->required(),
                    Forms\Components\Textarea::make('description')
                        ->minLength(2)
                        ->maxLength(1024)
                        ->autosize()
                        ->required(),
                    Forms\Components\Select::make('project_id')
                        ->relationship('project', 'titre')
                        ->native(false)
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('statu_id')
                        ->relationship('statu', 'tag')
                        ->native(false)
                        ->searchable()
                        ->preload(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Tables\Grouping\Group::make('statu.tag')
                    ->collapsible()
            ])
            ->columns([
                Tables\Columns\TextColumn::make('titre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('project.titre')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('statu.tag')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state, $record) {
                        $color = $record->statu->color ?? '#000';
                        return "<span style='background-color: {$color}; color: #fff; padding: 0.2em 0.4em; border-radius: 0.25em;display: inline-block; width: 80px; text-align: center;'>{$state}</span>";
                    })
                    ->html(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListLotissements::route('/'),
            'create' => Pages\CreateLotissement::route('/create'),
            'edit' => Pages\EditLotissement::route('/{record}/edit'),
        ];
    }
}
