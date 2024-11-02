<?php

namespace App\Filament\Resources\LevelActivitiesResource\Pages;

use App\Filament\Resources\LevelActivitiesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLevelActivities extends ListRecords
{
    protected static string $resource = LevelActivitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
