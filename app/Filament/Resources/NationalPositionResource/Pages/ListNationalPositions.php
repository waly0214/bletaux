<?php

namespace App\Filament\Resources\NationalPositionResource\Pages;

use App\Filament\Resources\NationalPositionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNationalPositions extends ListRecords
{
    protected static string $resource = NationalPositionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
