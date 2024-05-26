<?php

namespace App\Filament\Resources\MethodResource\Pages;

use App\Filament\Resources\MethodResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMethods extends ListRecords
{
    protected static string $resource = MethodResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
