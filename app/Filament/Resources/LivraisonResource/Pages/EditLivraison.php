<?php

namespace App\Filament\Resources\LivraisonResource\Pages;

use App\Filament\Resources\LivraisonResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLivraison extends EditRecord
{
    protected static string $resource = LivraisonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }
}
