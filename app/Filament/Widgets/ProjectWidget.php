<?php

namespace App\Filament\Widgets;

use App\Models\Livraison;
use App\Models\Lotissement;
use App\Models\Project;
use App\Models\Task;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProjectWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Projects', Project::count())
                ->description('Projects created so far')
                ->descriptionIcon('heroicon-o-inbox-stack', IconPosition::Before)
                ->chart([10, 40, 30, 70, 50])
                ->color('success'),

            Stat::make('Lotissements', Lotissement::count())
                ->description('Projects created so far')
                ->descriptionIcon('heroicon-o-swatch', IconPosition::Before)
                ->chart([10, 50, 30, 40, 80])
                ->color('info'),

            Stat::make('Livraisons', Livraison::count())
                ->description('Projects created so far')
                ->descriptionIcon('heroicon-o-rocket-launch', IconPosition::Before)
                ->chart([10, 50, 30, 40, 80])
                ->color('warning'),

            Stat::make('Tasks', Task::count())
                ->description('Projects created so far')
                ->descriptionIcon('heroicon-o-list-bullet', IconPosition::Before)
                ->chart([10, 50, 30, 40, 80])
                ->color('primary')
        ];
    }
}
