<?php

namespace App\Filament\Resources\Products\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('sku')->badge()->color('info'),
                TextColumn::make('price')->formatStateUsing(
                    fn($state): string => 'Rp ' .
                        number_format((int) $state, 0, ',', '.'),
                ),
                TextColumn::make('stock')->icon('heroicon-o-cube'),
                TextColumn::make('is_active')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(
                        fn(bool $state): string => $state
                            ? 'Aktif'
                            : 'Nonaktif',
                    )
                    ->color(
                        fn(bool $state): string => $state
                            ? 'success'
                            : 'danger',
                    ),
                ImageColumn::make('image')->disk('public'),
            ])
            ->filters([
                //
            ])
            ->recordActions([ViewAction::make(), EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }
}
