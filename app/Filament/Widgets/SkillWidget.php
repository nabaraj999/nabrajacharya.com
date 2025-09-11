<?php

namespace App\Filament\Widgets;

use App\Models\Skill; // Assuming you have a Skill model
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SkillWidget extends ChartWidget
{
    protected ?string $heading = 'Skills by Category';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Group skills by category
        $skills = Skill::select(
            'category',
            DB::raw('COUNT(*) as count')
        )
            ->whereNotNull('category')
            ->groupBy('category')
            ->get();

        // Prepare labels and data
        $labels = $skills->pluck('category')->toArray();
        $data = $skills->pluck('count')->toArray();

        // Generate colors dynamically based on number of categories
        $colors = $this->generateColors(count($labels));

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Skills by Category',
                    'data' => $data,
                    'backgroundColor' => $colors,
                    'borderColor' => array_map(fn($color) => str_replace('0.6', '1', $color), $colors),
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    private function generateColors(int $count): array
    {
        $baseColors = [
            'rgba(54, 162, 235, 0.6)',  // Blue
            'rgba(255, 99, 132, 0.6)',  // Red
            'rgba(75, 192, 192, 0.6)',  // Teal
            'rgba(255, 205, 86, 0.6)',  // Yellow
            'rgba(153, 102, 255, 0.6)', // Purple
            'rgba(255, 159, 64, 0.6)',  // Orange
        ];

        $colors = [];
        for ($i = 0; $i < $count; $i++) {
            $colors[] = $baseColors[$i % count($baseColors)];
        }

        return $colors;
    }
}
