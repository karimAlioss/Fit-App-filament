<?php

namespace App\Enums;
use Filament\Support\Contracts\HasLabel;

enum AmoeType: string implements HasLabel {
    
    case Choix1 = 'choix 1';
    case Choix2 = 'choix 2';
    case Choix3 = 'choix 3';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Choix1 => 'choix 1',
            self::Choix2 => 'choix 2',
            self::Choix3 => 'choix 3',
        };
    }
}