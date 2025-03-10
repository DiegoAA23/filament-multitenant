<?php

namespace App\Filament\Tenant\Resources\DeliveryResource\Pages;

use App\Filament\Tenant\Resources\DeliveryResource;
use App\Filament\Tenant\Resources\DeliveryResource\Widgets\OrderCompleted;
use App\Filament\Tenant\Resources\DeliveryResource\Widgets\OrderTotal;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeliveries extends ListRecords
{
    protected static string $resource = DeliveryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OrderCompleted::class,
            //OrderTotal::class
        ];
    }
}
