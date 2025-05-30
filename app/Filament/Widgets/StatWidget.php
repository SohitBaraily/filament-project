<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatWidget extends BaseWidget
{

    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make('Total Category', Category::count()),
            Stat::make('Total Article', Article::count()),
            Stat::make('Time', now()->format('H:i')),
        ];
    }
}

