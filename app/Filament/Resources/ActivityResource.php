<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityRegistrationsResource\RelationManagers\RegistrationsRelationManager;
use App\Filament\Resources\ActivityRegistrationsResource\RelationManagers\UsersRelationManager;
use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;
use App\Filament\Resources\LevelActivitiesResource\RelationManagers\LevelRelationManager;
use App\Filament\Resources\TypeActivitiesResource\RelationManagers\TypeRelationManager;
use App\Models\Activity;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Commun';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                    ->schema([

                        Section::make()
                            ->schema([
                                TextInput::make('title')
                                    ->required(),
                                Select::make('type')
                                    ->relationship('type', 'label')
                                    ->preload(),
                                Select::make('level')
                                    ->relationship('level', 'label')
                                    ->preload(),
                            ])
                            ->columns(3),


                        Textarea::make('description')
                            ->required(),

                        TextInput::make('min_user')
                            ->required(),
                        TextInput::make('max_user')
                            ->required(),

                        Fieldset::make('Dates')
                            ->schema([
                                DatePicker::make('begin')
                                    ->minDate(now()),
                                DatePicker::make('ending'),
                            ])
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Split::make([
                    TextColumn::make('title')
                        ->searchable(),

                    Stack::make([
                        TextColumn::make('type.label')
                            ->limit(10)
                            ->badge(),
                        TextColumn::make('level.label')
                            ->limit(10)
                            ->badge(),
                    ]),

                    TextColumn::make('min_user')
                        ->formatStateUsing(function ($state, Activity $activity) {
                            return $activity->min_user . ' / ' . $activity->max_user;
                        })
                        ->badge(),
                ]),

                Panel::make([
                    Split::make([
                        TextColumn::make('description')->limit(30),
                    ]),
                    Split::make([
                        TextColumn::make('begin')
                            ->since(),
                        TextColumn::make('ending')
                            ->since(),
                    ]),
                ])->collapsible()->visible(Auth::user()->isAdmin()),

                /*
                TextColumn::make('role.label')
                    ->badge()
                    ->searchable(),
                */

            ])

            ->contentGrid([
                'md' => 1,
                'xl' => 3,
            ])

            ->filters([
                Filter::make('begin')
                    ->query(function (Builder $query): Builder {
                        return $query->where('begin', '>=', now());
                    }),
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
            RegistrationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
