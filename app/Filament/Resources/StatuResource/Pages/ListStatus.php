<?php

namespace App\Filament\Resources\StatuResource\Pages;

use App\Filament\Resources\StatuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatus extends ListRecords
{
    protected static string $resource = StatuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
