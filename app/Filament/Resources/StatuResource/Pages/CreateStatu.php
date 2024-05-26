<?php

namespace App\Filament\Resources\StatuResource\Pages;

use App\Filament\Resources\StatuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStatu extends CreateRecord
{
    protected static string $resource = StatuResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
