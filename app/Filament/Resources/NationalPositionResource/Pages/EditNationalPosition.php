<?php

namespace App\Filament\Resources\NationalPositionResource\Pages;

use App\Filament\Resources\NationalPositionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNationalPosition extends EditRecord
{
    protected static string $resource = NationalPositionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
