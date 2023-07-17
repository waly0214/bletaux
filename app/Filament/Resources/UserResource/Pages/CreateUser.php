<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        /** @var \App\Models\User $user */
        $user = parent::handleRecordCreation($data);
        $user->assignRole('Administrator');

        return $user;
    }

    protected function getCreatedNotificationTitle(): ?string {
        return 'User was successfully created';
    }

}




