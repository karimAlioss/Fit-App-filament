<?php

namespace App\Filament\Resources\LotissementResource\Pages;

use App\Filament\Resources\LotissementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLotissement extends EditRecord
{
    protected static string $resource = LotissementResource::class;

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
