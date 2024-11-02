<?php

namespace App\Filament\Resources\ActivityResource\Pages;

use App\Filament\Resources\ActivityResource;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateActivity extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = ActivityResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['user_id'] = Auth::id();

        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        return static::getModel()::create($data);
    }

    protected function getSteps(): array
    {
        return [
            Step::make('Information')
                ->description('Principales informations')
                ->schema([
                    TextInput::make('title')
                        ->required(),
                    TextInput::make('description')
                        ->required(),
                    TextInput::make('min_user')
                        ->required(),
                    TextInput::make('max_user')
                        ->required(),
                ]),
            Step::make('Date')
                ->schema([
                    DatePicker::make('begin')
                        ->minDate(now()),
                    DatePicker::make('ending'),
                ]),
            Step::make('Tags')
                ->schema([
                    Select::make('type')
                        ->relationship('type', 'label')
                        ->preload(),
                    Select::make('level')
                        ->relationship('level', 'label')
                        ->preload(),
                ]),

        ];
    }
}
