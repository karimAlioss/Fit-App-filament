<?php

namespace App\Filament\Resources\MethodResource\Pages;

use App\Filament\Resources\MethodResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMethod extends EditRecord
{
    protected static string $resource = MethodResource::class;

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
