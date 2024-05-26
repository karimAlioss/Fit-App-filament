<?php

namespace App\Filament\Resources\StatuResource\Pages;

use App\Filament\Resources\StatuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatu extends EditRecord
{
    protected static string $resource = StatuResource::class;

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
