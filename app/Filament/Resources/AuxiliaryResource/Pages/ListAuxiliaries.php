<?php

namespace App\Filament\Resources\AuxiliaryResource\Pages;

use App\Filament\Resources\AuxiliaryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAuxiliaries extends ListRecords
{
    protected static string $resource = AuxiliaryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
