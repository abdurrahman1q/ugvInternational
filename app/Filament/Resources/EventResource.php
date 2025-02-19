<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;


class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationLabel = 'Events';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Main Information Section
                Section::make('Event Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state)))
                            ->lazy()
                            ->label('Event Title'),

                        TextInput::make('slug')
                            ->required()
                            ->readOnly()
                            ->unique(ignoreRecord: true),

                        Select::make('status')
                            ->options([
                                'Draft' => 'Draft',
                                'Published' => 'Published',
                                'Cancelled' => 'Cancelled',
                            ])
                            ->default('Draft')
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state === 'Published') {
                                    $set('published_at', now());
                                }
                            })
                            ->label('Status'),

                        DateTimePicker::make('published_at')
                            ->hidden(fn($get) => $get('status') !== 'Published')
                            ->label('Publish Date'),
                    ]),

                // Media Section
                Section::make('Media')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('image_path')
                            ->image()
                            ->nullable()
                            ->label('Main Event Image'),

                        Repeater::make('images')
                            ->label('Gallery Images')
                            ->schema([
                                FileUpload::make('path')
                                    ->label('Image')
                                    ->image()
                                    ->required(),
                                TextInput::make('caption')
                                    ->label('Caption')
                                    ->maxLength(255)
                                    ->required(),
                            ])
                            ->columns(2)
                            ->createItemButtonLabel('Add Gallery Image'),
                    ]),

                // Date & Time Section
                Section::make('Timing')
                    ->columns(2)
                    ->schema([
                        DateTimePicker::make('start_date')
                            ->required()
                            ->label('Start Date'),

                        DateTimePicker::make('end_date')
                            ->nullable()
                            ->label('End Date')
                            ->rules(['after:start_date']),
                    ]),

                // Venue Information Section
                Section::make('Venue Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('venue_name')
                            ->nullable()
                            ->label('Venue Name'),

                        TextInput::make('location')
                            ->nullable()
                            ->label('Full Address'),

                        TextInput::make('phone')
                            ->nullable()
                            ->label('Contact Phone')
                            ->tel()
                            ->maxLength(20),

                        TextInput::make('website')
                            ->nullable()
                            ->label('Website URL')
                            ->url(),

                        KeyValue::make('social_links')
                            ->nullable()
                            ->label('Social Media Links')
                            ->keyLabel('Platform (e.g., facebook)')
                            ->valueLabel('URL')
                            ->helperText('Format: Platform name (lowercase) as key, full URL as value'),

                        TextInput::make('map_embed_url')
                            ->nullable()
                            ->label('Google Maps Embed URL')
                            ->helperText('Paste the full iframe src URL here'),
                    ]),

                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->label('Event Description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Title'),
                ImageColumn::make('image_path')->label('Event Image'),
                BadgeColumn::make('status')
                    ->colors([
                        'primary' => 'Published',
                        'warning' => 'Draft',
                        'danger' => 'Cancelled',
                    ])
                    ->label('Status'),

                TextColumn::make('creator.name')->label('Created By')->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Draft' => 'Draft',
                        'Published' => 'Published',
                        'Cancelled' => 'Cancelled',
                    ]),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
