<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';


    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required()->maxLength(255),
            TextInput::make('email')->email()->required()->maxLength(255),
            TextInput::make('department')->required()->maxLength(255),
            TextInput::make('session')->required()->maxLength(255),
            TextInput::make('country')->required()->maxLength(255),
            TextInput::make('phone')->required()->maxLength(255),
            FileUpload::make('image')->directory('students-images')->nullable(),
            Repeater::make('social_links')
                ->schema([
                    Select::make('platform')
                        ->options([
                            'facebook'  => 'Facebook',
                            'twitter'   => 'Twitter',
                            'linkedin'  => 'LinkedIn',
                            'instagram' => 'Instagram',
                        ])
                        ->required(),
                    TextInput::make('url')->url()->required(),
                ])
                ->columns(2)
                ->defaultItems(1)
                ->createItemButtonLabel('Add Social Link')
                ->label('Social Links')
                ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('department')->sortable(),
                TextColumn::make('session')->sortable(),
                TextColumn::make('country')->sortable(),
                TextColumn::make('phone'),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
