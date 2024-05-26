<?php

namespace App\Filament\Resources\LivraisonResource\Pages;

use App\Filament\Resources\LivraisonResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLivraisons extends ListRecords
{
    protected static string $resource = LivraisonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
