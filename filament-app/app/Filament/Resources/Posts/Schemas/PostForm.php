<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Category;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(3)->components([
            Group::make([
                Section::make('Post Details')
                    ->description('Fill in the details of the post.')
                    ->icon('heroicon-o-document-text')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->rules('required | min:5 | max:10')
                            ->validationMessages([
                                'min' => 'Title minimal 5 karakter.',
                            ]),
                        TextInput::make('slug')
                            ->rules('required|min:3')
                            ->unique(ignoreRecord: true)
                            ->validationMessages([
                                'min' => 'Slug minimal 3 karakter.',
                                'unique' => 'Slug harus unik.',
                            ]),
                        Select::make('category_id')
                            ->required()
                            ->relationship('category', 'name')
                            ->options(Category::all()->pluck('name', 'id'))
                            // ->preload()
                            ->searchable(),
                        ColorPicker::make('color'),
                    ]),

                Section::make('Content')
                    ->icon('heroicon-o-pencil')
                    ->schema([MarkdownEditor::make('content')]),
            ])->columnSpan(2),

            Group::make([
                Section::make('Image Upload')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('image')
                            ->required()
                            ->disk('public')
                            ->directory('posts'),
                    ]),

                Section::make('Meta Information')
                    ->icon('heroicon-o-cog')
                    ->schema([
                        TagsInput::make('tags'),
                        Checkbox::make('published'),
                        DateTimePicker::make('published_at'),
                    ]),
            ])->columnSpan(1),
        ]);
    }
}
