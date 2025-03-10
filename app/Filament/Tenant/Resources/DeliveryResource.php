<?php

namespace App\Filament\Tenant\Resources;

use App\Filament\Tenant\Resources\DeliveryResource\Pages;
use App\Filament\Tenant\Resources\DeliveryResource\RelationManagers;
use App\Filament\Tenant\Resources\DeliveryResource\Widgets\OrderCompleted;
use App\Models\Delivery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeliveryResource extends Resource
{
    protected static ?string $model = Delivery::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Entregas';

    protected static ?string $breadcrumb = 'Entregas';

    protected static ?string $label = 'Entrega';

    protected static ?string $pluralLabel = 'Entregas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->color('primary')
                    ->weight(FontWeight::Bold)
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('empresa')
                    ->label('EMPRESA')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tracking')
                    ->label('TRACKING')
                    ->searchable(),
                Tables\Columns\TextColumn::make('motorista')
                    ->label('MOTORISTA')
                    ->searchable(),
                Tables\Columns\TextColumn::make('origen')
                    ->label('ORIGEN')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vehiculo')
                    ->label('VEHÍCULO')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha')
                    ->label('FECHA')
                    ->searchable(),
                Tables\Columns\TextColumn::make('staus')
                    ->label('STATUS')
                    ->badge()
                    ->alignCenter()
                    ->size('lg')
                    ->formatStateUsing(fn(string $state): string => strtoupper($state))
                    ->colors([
                        'primary' => 'En Ruta',
                        'success' => 'Completado',
                        'warning' => 'Pendiente',
                        'danger' => 'Cancelado',
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('staus') // Verificar si es 'status' o 'staus'
                    ->label('Status')
                    ->options([
                        'En Ruta' => 'En Ruta',
                        'Completado' => 'Completado',
                        'Pendiente' => 'Pendiente',
                        'Cancelado' => 'Cancelado',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->hiddenLabel()->icon('heroicon-o-eye')->color('gray')->iconSize('lg'),
                Tables\Actions\EditAction::make()->hiddenLabel()->icon('heroicon-o-pencil-square')->color('gray')->iconSize('md'),
                Tables\Actions\DeleteAction::make()->hiddenLabel()->icon('heroicon-o-trash')->color('gray')->iconSize('md'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDeliveries::route('/'),
            'create' => Pages\CreateDelivery::route('/create'),
            'edit' => Pages\EditDelivery::route('/{record}/edit'),
        ];
    }


    public static function getNavigationLabel(): string
    {
        return 'Gestión de entregas';
    }
}
