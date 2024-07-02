<?php

namespace App\Filament\Widgets;

use App\Models\Lotissement;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class LotissementsChart extends ChartWidget
{
    protected static ?string $heading = 'Lotissements';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $statuses = Lotissement::select('statu_id', DB::raw('COUNT(*) as count'))
            ->groupBy('statu_id')
            ->with('statu')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->statu->tag => $item->count];
            })
            ->toArray();

        $labels = array_keys($statuses);
        $data = array_values($statuses);

        // Define colors based on your status tags
        $colors = [
            'En Planning' => 'rgba(128, 128, 128, 0.2)',
            'En Progress' => 'rgba(144, 238, 144, 0.5)',
            'En Testing' => 'rgba(119, 136, 153, 0.5)',
            'Liv Preprod' => 'rgba(255, 105, 180, 0.5)',
            'Liv en Prod' => 'rgba(70, 130, 180, 0.5)',
            'En Pause' => 'rgba(255, 215, 0, 0.5)',
            'Critical' => 'rgba(255, 69, 0, 0.5)',
            'Completed' => 'rgba(173, 216, 230, 0.5)',
        ];

        $borderColors = [
            'En Planning' => 'rgba(128, 128, 128, 1)',
            'En Progress' => 'rgba(144, 238, 144, 1)',
            'En Testing' => 'rgba(119, 136, 153, 1)',
            'Liv Preprod' => 'rgba(255, 105, 180, 1)',
            'Liv en Prod' => 'rgba(70, 130, 180, 1)',
            'En Pause' => 'rgba(255, 215, 0, 1)',
            'Critical' => 'rgba(255, 69, 0, 1)',
            'Completed' => 'rgba(173, 216, 230, 1)',
        ];

        $backgroundColor = [];
        $borderColor = [];
        foreach ($labels as $label) {
            $backgroundColor[] = $colors[$label] ?? 'rgba(0, 0, 0, 0.2)'; // Default to black if not found
            $borderColor[] = $borderColors[$label] ?? 'rgba(0, 0, 0, 1)'; // Default to black if not found
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Status des Lotissements',
                    'backgroundColor' => $backgroundColor,
                    'borderColor' => $borderColor,
                    'borderWidth' => 0.5,
                    'data' => $data,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
