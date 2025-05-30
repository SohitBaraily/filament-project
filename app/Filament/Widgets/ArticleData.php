<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Widgets\ChartWidget;

class ArticleData extends ChartWidget
{

    protected static ?string $heading = 'Article Data';

    protected int|array|string $columnSpan = 'full';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Fetch article counts grouped by month for the current year
        $articlesByMonth = Article::selectRaw('MONTH(created_at) as month , COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Initialize data array with 0 for all months (1 to 12)
        $data = array_fill(1, 12, 0);

        // Fill in the actual counts for months with articles
        foreach ($articlesByMonth as $month => $count) {
            $data[$month] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Articles per Month',
                    'data' => array_values($data),//[90, 0, 3, 76, 43, 47, 84, 54, 25 ,64,67, 32],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
