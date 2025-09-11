<?php

namespace App\Filament\Widgets;

use App\Models\Project; // Assuming you have a Project model
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ProjectWidget extends ChartWidget
{
    protected ?string $heading = 'Project Widget';
 protected static ?int $sort = 3;

    protected function getData(): array
    {
        // Group projects by month of project_start_date
        $projects = Project::select(
            DB::raw("DATE_FORMAT(project_start_date, '%Y-%m') as month"),
            DB::raw('COUNT(*) as count')
        )
            ->whereNotNull('project_start_date')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Prepare labels (e.g., "2025-01", "2025-02") and data
        $labels = $projects->pluck('month')->toArray();
        $data = $projects->pluck('count')->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Projects Started',
                    'data' => $data,
                    'borderColor' => '#36A2EB', // Blue for the line
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)', // Light fill under the line
                    'fill' => true, // Fill area under the line
                    'tension' => 0.4, // Smooth the line
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
