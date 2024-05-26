<?php

namespace App\Filament\Resources\MethodResource\Pages;

use App\Filament\Resources\MethodResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMethod extends CreateRecord
{
    protected static string $resource = MethodResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
