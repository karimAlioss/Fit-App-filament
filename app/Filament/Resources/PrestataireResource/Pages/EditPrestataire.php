<?php

namespace App\Filament\Resources\PrestataireResource\Pages;

use App\Filament\Resources\PrestataireResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPrestataire extends EditRecord
{
    protected static string $resource = PrestataireResource::class;

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
