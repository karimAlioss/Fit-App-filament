<?php

namespace App\Filament\Resources\LotissementResource\Pages;

use App\Filament\Resources\LotissementResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLotissement extends CreateRecord
{
    protected static string $resource = LotissementResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
