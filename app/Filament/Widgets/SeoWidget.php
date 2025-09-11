<?php

namespace App\Filament\Widgets;

use App\Models\Seo; // Assuming you have an Seo model
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SeoWidget extends ChartWidget
{
    protected ?string $heading = 'SEO Records by Page';
protected static ?int $sort = 6;
    protected function getData(): array
    {
        // Group SEO records by page_name
        $seoData = Seo::select(
            'page_name',
            DB::raw('COUNT(*) as count')
        )
            ->groupBy('page_name')
            ->get();

        // Prepare labels and data
        $labels = $seoData->pluck('page_name')->toArray();
        $data = $seoData->pluck('count')->toArray();

        // Generate colors dynamically based on number of pages
        $colors = $this->generateColors(count($labels));

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'SEO Records by Page',
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
        return 'polarArea';
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
