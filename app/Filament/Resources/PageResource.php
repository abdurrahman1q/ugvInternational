<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
// use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state)))
                    ->lazy()
                    ->required(),
                TextInput::make('slug')->unique('pages', 'slug')->required(),
                Builder::make('blocks')
                    ->columnSpanFull()
                    ->label('Page content blocks')
                    ->helperText('Drag and drop blocks to change order')
                    ->schema([
                        Block::make('heading')
                            ->label('Heading')
                            ->columns(2)
                            ->schema([
                                TextInput::make('text')
                                    ->label('Heading text')
                                    ->required(),
                                Select::make('level')
                                    ->label('Heading level')
                                    ->options([
                                        'h1' => 'H1',
                                        'h2' => 'H2',
                                        'h3' => 'H3',
                                        'h4' => 'H4',
                                        'h5' => 'H5',
                                        'h6' => 'H6',
                                    ])
                                    ->default('h2')
                                    ->required(),
                            ]),
                        Block::make('text')
                            ->label('Text')
                            ->columnSpanFull()
                            ->schema([
                                Textarea::make('content')
                                    ->label('Text content')
                                    ->required(),
                            ]),
                        Block::make('markdown')
                            ->label('Markdown')
                            ->schema([
                                RichEditor::make('content')
                                    ->label('Markdown content')
                                    ->required(),
                            ]),
                        Block::make('image')
                            ->label('Image')
                            ->columns(2)
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Upload image')
                                    ->image()
                                    ->required(),
                                TextInput::make('caption')
                                    ->label('Image Caption')
                            ]),
                        Block::make('video')
                            ->label('Video')
                            ->schema([
                                TextInput::make('video_rul')
                                    ->label('Video URL')
                                    ->required(),
                            ]),
                        
                        Block::make('quote')
                            ->label('Quote')
                            ->columns(2)
                            ->schema([
                                TextArea::make('quote')
                                    ->label('Quote')
                                    ->required(),
                                TextInput::make('author')
                                    ->label('Author'),
                            ]),
                        Block::make('testimonial')
                            ->label('Testimonial')
                            ->columns(2)
                            ->schema([
                                TextArea::make('testimonial')
                                ->columnSpanFull()
                                    ->label('Testimonial')
                                    ->required(),
                                TextInput::make('name')
                                    ->label('Name')
                                    ->required(),
                                TextInput::make('role')
                                    ->label('Role'),
                            ]),
                        Block::make('layout')
                            ->label('Two Column Layout')
                            ->schema([
                                Builder::make('left_column')
                                    ->label('Left Column')
                                    ->blocks([
                                        Block::make('text')
                                            ->label('Text')
                                            ->schema([
                                                Textarea::make('content')
                                                    ->label('Text content')
                                                    ->required(),
                                            ]),
                                        Block::make('image')
                                            ->label('Image')
                                            ->columns(2)
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->label('Upload image')
                                                    ->image()
                                                    ->required(),
                                                TextInput::make('caption')
                                                    ->label('Image Caption')
                                            ]),
                                    ]),
                                Builder::make('right_column')
                                    ->label('Right Column')
                                    ->blocks([
                                        Block::make('text')
                                            ->label('Text')
                                            ->schema([
                                                Textarea::make('content')
                                                    ->label('Text content')
                                                    ->required(),
                                            ]),
                                        Block::make('image')
                                            ->label('Image')
                                            ->columns(2)
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->label('Upload image')
                                                    ->image()
                                                    ->required(),
                                                TextInput::make('caption')
                                                    ->label('Image Caption')
                                            ]),
                                    ]),
                            ]),


                    ])->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->sortable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
