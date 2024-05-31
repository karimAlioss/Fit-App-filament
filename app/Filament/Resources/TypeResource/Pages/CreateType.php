<?php

namespace App\Filament\Resources\TypeResource\Pages;

use App\Filament\Resources\TypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateType extends CreateRecord
{
    protected static string $resource = TypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
