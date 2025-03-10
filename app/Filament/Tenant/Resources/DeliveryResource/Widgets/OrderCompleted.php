<?php

namespace App\Filament\Tenant\Resources\DeliveryResource\Widgets;

use App\Models\Delivery;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderCompleted extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Entregas Completas', 1)
            ->description('En los últimos 14 días')
            ->chart([1, 3])->color('info'),
            Stat::make('Entregas Pendientes', 4)
            ->description('En los últimos 14 días')
            ->chart([1, 4])->color('info'),
            Stat::make('Entregas En Ruta', 6)
            ->description('En los últimos 14 días')
            ->chart([1, 2, 6])->color('info'),
        ];
    }
}
