<?php

namespace App\Filament\Widgets;

use App\Models\Education; // Assuming you have an Education model
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class EducationWidget extends ChartWidget
{
    protected ?string $heading = 'Education Metrics by Institution';

    protected function getData(): array
    {
        // Fetch data: count of completed and in-progress degrees, and average duration per institution
        $educationData = Education::select(
            'institution',
            DB::raw("SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed_count"),
            DB::raw("SUM(CASE WHEN status = 'in_progress' THEN 1 ELSE 0 END) as in_progress_count"),
            DB::raw("AVG(CASE WHEN start_year IS NOT NULL AND end_year IS NOT NULL THEN end_year - start_year ELSE 0 END) as avg_duration")
        )
            ->groupBy('institution')
            ->havingRaw('completed_count > 0 OR in_progress_count > 0')
            ->get();

        // Prepare labels (institutions) and datasets
        $labels = $educationData->pluck('institution')->toArray();
        $completedData = $educationData->pluck('completed_count')->toArray();
        $inProgressData = $educationData->pluck('in_progress_count')->toArray();
        $durationData = $educationData->pluck('avg_duration')->map(fn($value) => round($value, 1))->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Completed Degrees',
                    'data' => $completedData,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)', // Blue with transparency
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'pointBackgroundColor' => 'rgba(54, 162, 235, 1)',
                    'pointBorderColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => 'rgba(54, 162, 235, 1)',
                ],
                [
                    'label' => 'In-Progress Degrees',
                    'data' => $inProgressData,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)', // Red with transparency
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'pointBackgroundColor' => 'rgba(255, 99, 132, 1)',
                    'pointBorderColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => 'rgba(255, 99, 132, 1)',
                ],
                [
                    'label' => 'Avg Duration (Years)',
                    'data' => $durationData,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)', // Teal with transparency
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'pointBackgroundColor' => 'rgba(75, 192, 192, 1)',
                    'pointBorderColor' => '#fff',
                    'pointHoverBackgroundColor' => '#fff',
                    'pointHoverBorderColor' => 'rgba(75, 192, 192, 1)',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'radar';
    }
}
