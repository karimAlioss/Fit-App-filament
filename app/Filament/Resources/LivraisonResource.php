<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LivraisonResource\Pages;
use App\Models\Livraison;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LivraisonResource extends Resource
{
    protected static ?string $model = Livraison::class;
    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';
    protected static ?string $navigationGroup = 'Managements';
    protected static ?string $recordTitleAttribute = 'titre';
    protected static ?int $navigationSort = 3;

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
                    Forms\Components\TextInput::make('titre')
                        ->required(),
                    Forms\Components\Textarea::make('description')
                        ->minLength(2)
                        ->maxLength(1024)
                        ->autosize()
                        ->required(),
                    Forms\Components\Select::make('lotissement_id')
                        ->relationship('lotissement', 'titre')
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
            ->striped()
            ->groups([
                Tables\Grouping\Group::make('statu.tag')
                    ->label('Status')
                    ->collapsible()
            ])
            ->columns([
                Tables\Columns\TextColumn::make('reference')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('titre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lotissement.titre')
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
                        $backgroundColor = ProjectResource::hexToRgba($color, 0.7); // Adjust the opacity here (0.5 for 50%)
                        $borderColor = ProjectResource::hexToRgba($color, 1); // Full opacity for border

                        return "<span style='background-color: {$backgroundColor}; 
                        border: 1px solid {$borderColor}; 
                        color: #fff; 
                        font-size: .8rem;
                        padding: 0.2em 0.4em; 
                        border-radius: 0.25em; 
                        display: inline-block; 
                        width: 82px; 
                        text-align: center;'>{$state}</span>";
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
            'index' => Pages\ListLivraisons::route('/'),
            'create' => Pages\CreateLivraison::route('/create'),
            'edit' => Pages\EditLivraison::route('/{record}/edit'),
        ];
    }
}
