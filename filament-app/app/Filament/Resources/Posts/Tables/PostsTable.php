<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\IconColumn;
class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('slug')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->color('info')
                    ->icon('heroicon-o-tag')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ColorColumn::make('color')->toggleable(),
                ImageColumn::make('image')->disk('public')->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('tags')
                    ->label('Tags')
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('published')->boolean()->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('created_at')
                    ->label('Creation Date')
                    ->schema([
                        DatePicker::make('created_at')->label('Select Date : '),
                    ])
                    ->query(function ($query, $data) {
                        return $query->when(
                            $data['created_at'],
                            fn($query, $date) => $query->whereDate(
                                'created_at',
                                $date,
                            ),
                        );
                    }),
                SelectFilter::make('category_id')
                    ->label('Select Category')
                    ->relationship('category', 'name')
                    ->preload(),
            ])
            ->recordActions([
                EditAction::make()->icon('heroicon-o-pencil-square'),
                DeleteAction::make()->icon('heroicon-o-trash'),
                ReplicateAction::make()->icon('heroicon-o-document-duplicate'),
                Action::make('togglePublish')
                    ->label(
                        fn($record): string => $record->published
                            ? 'Unpublish'
                            : 'Publish',
                    )
                    ->icon(
                        fn($record): string => $record->published
                            ? 'heroicon-o-eye-slash'
                            : 'heroicon-o-eye',
                    )
                    ->color(
                        fn($record): string => $record->published
                            ? 'danger'
                            : 'success',
                    )
                    ->modalHeading(
                        fn($record): string => $record->published
                            ? 'Unpublish Post?'
                            : 'Publish Post?',
                    )
                    ->modalDescription(
                        fn($record): string => $record->published
                            ? 'Post akan disembunyikan dari publik.'
                            : 'Post akan ditampilkan untuk publik.',
                    )
                    ->modalSubmitActionLabel(
                        fn($record): string => $record->published
                            ? 'Ya, Unpublish'
                            : 'Ya, Publish',
                    )
                    ->action(
                        fn($record) => $record->update([
                            'published' => !$record->published,
                        ]),
                    )
                    ->requiresConfirmation(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }
}
