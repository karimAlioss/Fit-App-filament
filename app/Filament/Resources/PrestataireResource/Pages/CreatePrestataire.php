<?php

namespace App\Filament\Resources\PrestataireResource\Pages;

use App\Filament\Resources\PrestataireResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePrestataire extends CreateRecord
{
    protected static string $resource = PrestataireResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
