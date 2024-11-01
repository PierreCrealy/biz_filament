<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['email_verified_at'] = $data['auto_verified'] ? now() : null;

        unset($data['auto_verified']);

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
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(10),
                    TextInput::make('email')
                        ->required()
                        ->email()
                ]),
            Step::make('Pssword')
                ->schema([
                    TextInput::make('password')
                        ->password()
                        ->revealable()
                ]),
            Step::make('Validation')
                ->schema([
                    Toggle::make('auto_verified')
                        ->label('Validate user email')
                        ->default(false)
                ]),
        ];
    }
}
