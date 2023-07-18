<?php

namespace App\Filament\Resources\NationalPositionResource\Pages;

use App\Filament\Resources\NationalPositionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNationalPosition extends CreateRecord
{
    protected static string $resource = NationalPositionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
