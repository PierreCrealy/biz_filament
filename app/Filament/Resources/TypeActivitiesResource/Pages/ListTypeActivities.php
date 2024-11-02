<?php

namespace App\Filament\Resources\TypeActivitiesResource\Pages;

use App\Filament\Resources\TypeActivitiesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeActivities extends ListRecords
{
    protected static string $resource = TypeActivitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
