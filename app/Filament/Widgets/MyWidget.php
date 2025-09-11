<?php

namespace App\Filament\Widgets;

use App\Models\Service; // Assuming you have a Service model
use Filament\Widgets\ChartWidget;

class MyWidget extends ChartWidget
{
    protected ?string $heading = 'My Services';
 protected static ?int $sort = 4;

    protected function getData(): array
    {
        // Fetch counts of active and inactive services
        $activeCount = Service::where('is_active', true)->count();
        $inactiveCount = Service::where('is_active', false)->count();

        return [
            'labels' => ['Active Services', 'Inactive Services'],
            'datasets' => [
                [
                    'label' => 'Service Status',
                    'data' => [$activeCount, $inactiveCount],
                    'backgroundColor' => ['#36A2EB', '#FF6384'], // Blue for active, red for inactive
                    'borderColor' => ['#36A2EB', '#FF6384'],
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
