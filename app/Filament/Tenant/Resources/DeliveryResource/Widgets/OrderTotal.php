<?php

namespace App\Filament\Tenant\Resources\DeliveryResource\Widgets;

use App\Models\Delivery;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderTotal extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Entregas Completas', Delivery::count())
        ];
    }
}
