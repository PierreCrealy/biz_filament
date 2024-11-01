<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(10),
                        TextInput::make('email')
                            ->required()
                            ->email()
                            ->disabled(function (?User $record = null){
                                return $record !== null;
                            }),
                        TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->visible(function (?User $record = null){
                                return $record === null;
                            }),
                        DatePicker::make('email_verified_at')
                            ->maxDate(now()),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('email'),
                IconColumn::make('email_verified_at')
                    ->label('Verified')
                    ->getStateUsing(function ($record): bool {
                        return (bool) $record->email_verified_at;
                    })
                    ->trueColor('success')
                    ->falseColor('warning'),
                TextColumn::make('created_at')
                    ->since()
                    ->sortable()
            ])
            ->filters([
                Filter::make('verified')
                    ->query(function (Builder $query): Builder {
                        return $query->whereNotNull('email_verified_at');
                    })
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
