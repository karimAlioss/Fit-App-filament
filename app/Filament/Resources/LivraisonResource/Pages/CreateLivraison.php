<?php

namespace App\Filament\Resources\LivraisonResource\Pages;

use App\Filament\Resources\LivraisonResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLivraison extends CreateRecord
{
    protected static string $resource = LivraisonResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
