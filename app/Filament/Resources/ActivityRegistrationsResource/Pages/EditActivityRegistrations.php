<?php

namespace App\Filament\Resources\ActivityRegistrationsResource\Pages;

use App\Filament\Resources\ActivityRegistrationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditActivityRegistrations extends EditRecord
{
    protected static string $resource = ActivityRegistrationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
