<?php

namespace App\Filament\Resources\NationalPositionResource\Pages;

use App\Filament\Resources\NationalPositionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewNationalPosition extends ViewRecord
{
    protected static string $resource = NationalPositionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
