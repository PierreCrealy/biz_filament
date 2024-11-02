<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeActivitiesResource\Pages;
use App\Filament\Resources\TypeActivitiesResource\RelationManagers;
use App\Models\TypeActivities;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeActivitiesResource extends Resource
{
    protected static ?string $model = TypeActivities::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                //
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
            'index' => Pages\ListTypeActivities::route('/'),
            'create' => Pages\CreateTypeActivities::route('/create'),
            'edit' => Pages\EditTypeActivities::route('/{record}/edit'),
        ];
    }
}
