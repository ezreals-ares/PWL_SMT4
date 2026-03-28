<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('Product Tabs')
                ->tabs([
                    Tab::make('Product Details')
                        ->icon('heroicon-o-information-circle')
                        ->badge('Info')
                        ->badgeColor('primary')
                        ->schema([
                            TextEntry::make('name')
                                ->label('Product Name')
                                ->weight('bold')
                                ->color('primary'),
                            TextEntry::make('id')->label('Product ID'),
                            TextEntry::make('sku')
                                ->label('Product SKU')
                                ->badge()
                                ->color('info'),
                            TextEntry::make('description')->label(
                                'Product Description',
                            ),
                            TextEntry::make('created_at')
                                ->label('Product Created Date')
                                ->date('d M Y')
                                ->color('info'),
                        ]),
                    Tab::make('Pricing & Stock')
                        ->icon('heroicon-o-currency-dollar')
                        ->badge('10')
                        ->badgeColor('warning')
                        ->schema([
                            TextEntry::make('price')
                                ->label('Price')
                                ->icon('heroicon-o-currency-dollar'),
                            TextEntry::make('stock')
                                ->label('Stock')
                                ->badge()
                                ->formatStateUsing(
                                    fn($state): string => (int) $state <= 0
                                        ? 'Habis'
                                        : ((int) $state <= 10
                                            ? 'Menipis: ' . $state
                                            : 'Tersedia: ' . $state),
                                )
                                ->color(
                                    fn($state): string => (int) $state <= 0
                                        ? 'danger'
                                        : ((int) $state <= 10
                                            ? 'warning'
                                            : 'success'),
                                ),
                        ]),
                    Tab::make('Media & Status')
                        ->icon('heroicon-o-photo')
                        ->badge('Media')
                        ->badgeColor('success')
                        ->schema([
                            ImageEntry::make('image')
                                ->label('Product Image')
                                ->disk('public'),
                            IconEntry::make('is_active')
                                ->label('Active')
                                ->boolean(),
                            IconEntry::make('is_featured')
                                ->label('Featured')
                                ->boolean(),
                        ]),
                ])
                ->columnSpanFull()
                ->vertical(),
            Section::make('Product Info')
                ->schema([
                    TextEntry::make('name')
                        ->label('Product Name')
                        ->weight('bold')
                        ->color('primary'),
                    TextEntry::make('id')->label('Product ID'),
                    TextEntry::make('sku')
                        ->label('Product SKU')
                        ->badge()
                        ->color('warning'),
                    TextEntry::make('description')->label(
                        'Product Description',
                    ),
                ])
                ->columnSpanFull(),
            Section::make('Pricing & Stock')
                ->schema([
                    TextEntry::make('price')
                        ->label('Product Price')
                        ->icon('heroicon-o-currency-dollar'),
                    TextEntry::make('stock')
                        ->label('Product Stock')
                        ->badge()
                        ->formatStateUsing(
                            fn($state): string => (int) $state <= 0
                                ? 'Habis'
                                : ((int) $state <= 10
                                    ? 'Menipis: ' . $state
                                    : 'Tersedia: ' . $state),
                        )
                        ->color(
                            fn($state): string => (int) $state <= 0
                                ? 'danger'
                                : ((int) $state <= 10
                                    ? 'warning'
                                    : 'success'),
                        ),
                ])
                ->columnSpanFull(),
            Section::make('image and status')
                ->description('')
                ->schema([
                    ImageEntry::make('image')
                        ->label('Product Image')
                        ->disk('public'),
                    TextEntry::make('price')
                        ->label('Product Price')
                        ->weight('bold')
                        ->color('primary')
                        ->icon('heroicon-o-currency-dollar'),
                    TextEntry::make('stock')
                        ->label('Product Stock')
                        ->weight('bold')
                        ->badge()
                        ->formatStateUsing(
                            fn($state): string => (int) $state <= 0
                                ? 'Habis'
                                : ((int) $state <= 10
                                    ? 'Menipis: ' . $state
                                    : 'Tersedia: ' . $state),
                        )
                        ->color(
                            fn($state): string => (int) $state <= 0
                                ? 'danger'
                                : ((int) $state <= 10
                                    ? 'warning'
                                    : 'success'),
                        ),
                    IconEntry::make('is_active')->label('Is Active')->boolean(),
                    IconEntry::make('is_featured')
                        ->label('Is Featured')
                        ->boolean(),
                ])
                ->columnSpanFull(),
        ]);
    }
}
