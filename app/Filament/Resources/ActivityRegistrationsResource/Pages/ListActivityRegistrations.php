<?php

namespace App\Filament\Resources\ActivityRegistrationsResource\Pages;

use App\Filament\Resources\ActivityRegistrationsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListActivityRegistrations extends ListRecords
{
    protected static string $resource = ActivityRegistrationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
