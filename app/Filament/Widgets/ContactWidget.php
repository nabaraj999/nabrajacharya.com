<?php

namespace App\Filament\Widgets;

use App\Models\Contact; // Assuming you have a Contact model
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ContactWidget extends ChartWidget
{
    protected ?string $heading = 'Contacts: Creation Date vs. Message Length';
 protected static ?int $sort = 5;

    protected function getData(): array
    {
        // Fetch contacts with creation date and message length
        $contacts = Contact::select(
            'created_at',
            'message'
        )
            ->orderBy('created_at')
            ->get();

        // Find the earliest creation date for normalization
        $earliestDate = $contacts->min('created_at') ?? Carbon::now();

        // Prepare scatter data: x = days since earliest contact, y = message length
        $dataPoints = $contacts->map(function ($contact) use ($earliestDate) {
            return [
                'x' => Carbon::parse($contact->created_at)->diffInDays($earliestDate),
                'y' => strlen($contact->message),
            ];
        })->toArray();

        return [
            'labels' => [], // Scatter charts don't use labels in the same way
            'datasets' => [
                [
                    'label' => 'Contacts',
                    'data' => $dataPoints,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.6)', // Blue points
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'pointRadius' => 5,
                    'pointHoverRadius' => 8,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'scatter';
    }
}
