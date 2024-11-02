<?php

namespace App\Filament\Resources\LevelActivitiesResource\Pages;

use App\Filament\Resources\LevelActivitiesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLevelActivities extends EditRecord
{
    protected static string $resource = LevelActivitiesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
