<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Enums\AmaoType;
use App\Enums\AmoeType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?string $navigationGroup = 'Managements';
    protected static ?string $recordTitleAttribute = 'titre';
    protected static ?int $navigationSort = 1;

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
                    Forms\Components\Select::make('amao')
                        ->required()
                        ->native(false)
                        ->options(AmaoType::class),
                    Forms\Components\Select::make('amoe')
                        ->required()
                        ->native(false)
                        ->options(AmoeType::class),
                    Forms\Components\Select::make('type_id')
                        ->relationship('type', 'tag')
                        ->native(false)
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('method_id')
                        ->relationship('method', 'tag')
                        ->native(false)
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('sponsor_id')
                        ->relationship('sponsor', 'tag')
                        ->native(false)
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('prestataire_id')
                        ->relationship('prestataire', 'tag')
                        ->native(false)
                        ->searchable()
                        ->preload(),
                    Forms\Components\Select::make('statu_id')
                        ->relationship('statu', 'tag')
                        ->native(false)
                        ->searchable()
                        ->preload(),
                    Forms\Components\Hidden::make('team_id')
                        ->default(fn () => Auth::user()->team_id)
                        ->required(),
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
                Tables\Columns\TextColumn::make('titre')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('amao')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('amoe')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('team.name')
                    ->badge()
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
                // Add any necessary filters here
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

    protected static function getTableQuery(): Builder
    {
        return parent::getTableQuery();
    }

    public static function getRelations(): array
    {
        return [
            // Define any necessary relationships here
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
