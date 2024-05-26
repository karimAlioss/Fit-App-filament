<?php

namespace App\Filament\Resources\LotissementResource\Pages;

use App\Filament\Resources\LotissementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLotissements extends ListRecords
{
    protected static string $resource = LotissementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
