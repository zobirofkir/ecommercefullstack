<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
                Stat::make('Products', Product::count())
                        ->description('Products ')
                        ->descriptionIcon('heroicon-m-arrow-trending-up')
                        ->chart([1, 10, 5, 2, 20, 30, 45])
                        ->color('success'),

                Stat::make('Categories', Category::count())
                    ->description('Categories ')
                    ->descriptionIcon('heroicon-m-arrow-trending-up')
                    ->chart([1, 10, 5, 2, 20, 30, 45])
                    ->color('success'),

                Stat::make('Blogs', Blog::count())
                    ->description('Blogs ')
                    ->descriptionIcon('heroicon-m-arrow-trending-up')
                    ->chart([1, 10, 5, 2, 20, 30, 45])
                    ->color('success'),

                Stat::make('Orders', Order::count())
                    ->description('Orders ')
                    ->descriptionIcon('heroicon-m-arrow-trending-up')
                    ->chart([1, 10, 5, 2, 20, 30, 45])
                    ->color('success'),

        ];
    }
}
